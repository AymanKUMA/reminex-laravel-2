<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Auth::user()->isadmin == 0){
            return back();
        }
        return view('users.create')->with('message', 'Fill the fields to add a new user!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|min:4|regex:/^\S*$/u|unique:users',
            'email' => 'required|string|email|unique:users',
            'isadmin' => 'required',
            'password' => 'required|string|min:8',
            'passwordConfirmation' => 'required|same:password',
            'image' => 'mimes:png,jpg,jpeg|max:2000',
        ]);

            $user = new User();

            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->isadmin = $request->isadmin;
            $user->password = Hash::make($request->password);
            if ($request->image) {
                $user->profile_image_path = time() . '-' . str_replace(' ', '', $request->username) . '.' . $request->image->extension();
                $request->image->move(public_path('slides_images'), $user->profile_image_path);
            } else {
                $user->profile_image_path = "";
            }

            if($user->save()) {
                return redirect()->route('users.index')->with('message', 'User added successfully !');
            }else {
                return back()->with('error', 'user can\'t be added due to an error');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        //
        return view('users.show', [
            'user' => User::findOrFail($user),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        //
        if($user == Auth::user()->id){
            return view('profile');
        }
        else if(Auth::user()->isadmin == 0){
            return back()->with('error','Only Admin could edit users account');
        }
        return view('users.edit',[
            'user' => User::findOrFail($user),
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        //
         $msg = "";
        $record = User::findOrFail($user);
        $record->isadmin = $request->isadmin;

        if($request->reset == "true"){
            $newPassword = $record->username . "0000";
            $record->password = Hash::make($newPassword);
            $msg="New password is: $newPassword";
        }

        if($record->save()){
            $msg= "$record->username's Profile has ben saved successfully! \n $msg";
            return redirect()
                ->route('users.index')
                ->with('message',$msg);
        }
        else{
            return back()->with('error',"Something went wrong while updating '$record->name' Profile");
        }

       }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        //
        if(Auth::user()->isadmin == 0){
            return back()->with('error',"Only Admin could delete user account");
        }
        $record = User::findOrFail($user);
        $username = $record->username;
        $delete_image_path = public_path('profile_pics') . '/' . $record->profilr_image_path;
        if (File::exists(strval($delete_image_path))) {
            File::delete(strval($delete_image_path));
        }
        if ($record->delete() === false) {
          return  back()->with('error'," user can't be deleted due to an Error !");
        } else {
            return redirect()->route('users.index')->with('message', $username . " has been deleted successfully !");
        }
    }

}
