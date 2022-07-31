<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\Slide;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function home(){
        return view('welcome', [
            'alerts' => Alert::all(),
            'slides' => Slide::all()
        ]);
    }
}
