<?php

namespace App\Http\Controllers;

use App\studio;
use Illuminate\Http\Request;

class StudiosController extends Controller
{
    public function index()
    {
        $studios = Studio::latest()->get();
        
        return view('admin.studios.index', compact('studios'));
    }

    public function studio(Studio $studio)
    {
        return view('admin.studios.studio', compact('studio'));
    }

    public function create()
    {
        return view('admin.studios.create');
    }

    public function store()
    {
        // dd(request()->all()); // dump & display submitted data

        $this->validate(request(), [
            'name'          => 'required|unique:studios,name',
            'info'          => 'required',
            'specs'         => 'required',
            'cover_photo'   => '',
            'photos'        => '',
            'location'      => 'required',
            'assistance'    => ''
            
        ]);

        // gather data and add it to the database
        studio::create(request(['name', 'info', 'specs', 'cover_photo', 'photos', 'location', 'assistance']));

        //then redirect to the home page
        return redirect('/admin/studios');
    }

    public function edit(Studio $studio){
        return view('admin.studios.edit', compact('studio'));
    }

    public function update(Request $request, Studio $studio){
        // dd(request()->all()); // dump & display submitted data

        $studio->name = $request->name;
        $studio->info = $request->info; 
        $studio->specs = $request->specs; 
        $studio->cover_photo = $request->coverPhoto; 
        $studio->photos = $request->photos; 
        $studio->location = $request->location; 
        $studio->assistance = $request->assistance;

        $studio->save();

        return back();
    }
}
