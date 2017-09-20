<?php

namespace App\Http\Controllers;

use App\equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipment = Equipment::latest()->get();
        
        return view('admin.equipment.index', compact('equipment'));
    }
}
