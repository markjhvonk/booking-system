<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;

class AdminController extends Controller
{
    public function index()
    {
        $bookings = Booking::orderBy('date')->get();
        return view('admin.index', compact('bookings'));
    }
}
