<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //show the profile 
    public function profile(){
        return view('profile');
    }

    //show the change password form
    public function changePassword(){
        return view('changePassword');
    }

    //update the password 
    public function updatePassword(Request $request){
        
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:8|max:20',
            'confirmedNewPassword' => 'required|same:newPassword',
        ]);

        if(!Hash::check($request->oldPassword, auth()->user()->password)){
            return back()->with('error', 'Old password is invalid ');
        }

        $user = User::findOrFail(auth()->user()->id);
        
        $user->password =  Hash::make($request->newPassword);
        
        $user->save();

        return back()->with('success', 'Password changed successfully!');
    }

    //profile update
    public function updateProfile(Request $request){

        $request->validate([
            'name' => 'required|string|max:255|',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $authUser = Auth::user()->id;
        $found = DB::select("SELECT * FROM users WHERE id != $authUser AND (email LIKE '$request->email' OR username LIKE '$request->username')");

        if(count($found) != 0){
            return back()->with('error', 'Username or email already taken !');
        }

        $user = User::findOrFail(auth()->user()->id);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;

        $user->save();

        return back()->with('success', 'Infromations changed successfully !');

    }
}
