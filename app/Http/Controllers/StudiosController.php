<?php

namespace App\Http\Controllers;

use App\equipment;
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
        $equipments = Equipment::whereNotIn('id', $studio->equipment->pluck('id'))
        ->select('id','name')
        ->get();

        return view('admin.studios.studio', compact('studio', 'equipments'));
    }

    public function create()
    {
        return view('admin.studios.create');
    }

    public function store()
    {
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

    public function update(Request $request, Studio $studio)
    {
        
        $this->validate(request(),[
            'name'          => 'required|unique:studios,name,'.$studio->id,
            'info'          => 'required',
            'specs'         => 'required',
            'cover_photo'   => '',
            'location'      => 'required',
            'assistance'    => ''
            
        ]);

        $studio->update($request->all());

        return back();
    }

    public function delete(Request $request, Studio $studio)
    {
        
        $studio->delete();

        return redirect('/admin/studios');
    }
}
