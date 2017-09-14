<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // $users = User::latest()->get();
        return view('admin.index');
    }
}
