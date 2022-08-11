<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('slides.index',[
            'slides'=>Slide::all(),
            'users' => User::all(),
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
        return view('slides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'layout' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:6000',
        ]);

        $newImageName = time() . '-' . str_replace(' ','',$request->title) . '.' . $request->image->extension();
        $request->image->move(public_path('slides_images'), $newImageName);

        $slide = new Slide();

        $slide->title = strip_tags($request->input('title'));
        $slide->subtitle = strip_tags($request->input('subtitle'));
        $slide->description = strip_tags($request->input('description'));
        $slide->updated_by = Auth::user()->id;
        $slide->created_by = Auth::user()->id;
        $slide->layout = strip_tags($request->input('layout'));
        $slide->image_path = $newImageName;

        $slide->save();

        return redirect()->route('slides.index')->with('message', 'slide added successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slide)
    {
        //
        return view('slides.show',[
            'slide' => Slide::findOrFail($slide)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slide)
    {
        //
        return view('slides.edit',[
            'slide' => Slide::findOrFail($slide)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $slide)
    {
        //
        $request->validate([
            'image' => 'mimes:jpg,png,jpeg|max:6000',
        ]);

        $record = Slide::findOrFail($slide);

        if(isset($request->image)){   
            $request->image->move(public_path('slides_images'), $record->image_path);
        }


        $record->title = strip_tags($request->input('title'));
        $record->subtitle = strip_tags($request->input('subtitle'));
        $record->description = strip_tags($request->input('description'));
        $record->updated_by = Auth::user()->id;
        $record->layout = strip_tags($request->input('layout'));
        $record->save();

        return redirect()->route('slides.index')->with('message', 'slide modified successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($slide)
    {
        //
        $record = Slide::findOrFail($slide);
        $delete_image_path = public_path('slides_images'). '\\' . $record->image_path;
        if(File::exists(strval($delete_image_path))) {
            File::delete(strval($delete_image_path));
        }
        $record->delete();
        return redirect()->route('slides.index')->with('message', 'slide deleted successfully !');
    }
}
