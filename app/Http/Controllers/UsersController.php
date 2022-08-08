<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

const ERROR_USERNAME = "this UserName already Taken";
const ERROR_EMAIL = "This Email is already Taken";
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
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'isadmin' => 'required',
            'password' => 'required',
            'image' => 'image|max:6000'
        ]);

        $user = $this->prepareUser($request);
        $res = $this->validateUser($user);
        if (count($res) == 0) {
            $user->save();
            return redirect()->route('users.index')->with('message', 'User added successfully !');

        } else {
            dd($res);
            back()->with('error', $res);

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
    }

    private function prepareUser($request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if (isset($request->profile_image_path)) {
            $user->profile_image_path = time() . '-' . str_replace(' ', '', $request->username) . '.' . $request->image->extension();
            $request->image->move(public_path('slides_images'), $user->profile_image_path);
        } else {
            $user->profile_image_path = "";
        }
        return $user;
    }

    private function validateUser($user)
    {
        $errors = [];
        $res1 = count(DB::select("SELECT * FROM users WHERE username like '$user->username'"));
        $res2 = count(DB::select("SELECT * FROM users WHERE username like '$user->email'"));


        if ($res1 != 0) $errors += [ERROR_USERNAME];
        if ($res2 != 0) $errors += [ERROR_EMAIL];

        return $errors;

    }
}
