<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlertsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('alerts.index',[
            'alerts' => Alert::all(),
            'users'  => User::all(),
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
        return view('alerts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'alert' => 'required',
        ]);

        $alert = new Alert();

        $alert->alert = strip_tags($request->input('alert'));
        $alert->updated_by = Auth::user()->id; 

        $alert->save();

        return redirect()->route('alerts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($alert)
    {
        //
        return view('alerts.edit',[
            'alert' => Alert::findOrFail($alert)
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $alert)
    {
        //
        $record = Alert::findOrFail($alert);

        $record->alert = strip_tags($request->input('alert'));
        $record->updated_by = Auth::user()->id; 

        $record->save();
        return redirect()->route('alerts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($alert)
    {
        //
        $record = Alert::findOrFail($alert);
        $record->delete();
        return redirect()->route('alerts.index');
    }
}
