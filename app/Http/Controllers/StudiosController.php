<?php

namespace App\Http\Controllers;

use App\studio;

class StudiosController extends Controller
{
    public function index()
    {
        $studios = Studio::all();
        
        return view('studios.index', compact('studios'));
    }

    public function studio(Studio $studio)
    {
        return view('studios.studio', compact('studio'));
    }

    public function create()
    {
        return view('studios.create');
    }

    public function store()
    {
        // dd(request()->all()); // dump & display submitted data

        //create new studio using the request data
        $studio = new studio;

        // gather data and add it to the database
        studio::create(request(['name', 'info', 'specs', 'cover_photo', 'photos', 'location', 'assistance']));

        //then redirect to the home page
        return redirect('/admin/studios');
    }
}
