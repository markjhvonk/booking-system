<?php

namespace App\Http\Controllers;

use App\equipment;
use App\category;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $equipment = Equipment::latest()->get();
        
        return view('admin.equipment.index', compact('equipment','categories'));
    }

    public function create()
    {
        // $equipment = Equipment::latest()->get();
        
        return view('admin.equipment.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name'          => 'required|unique:equipment,name',
            'description'   => '',
            'data'          => '',
            'price'         => ''
            
        ]);

        // gather data and add it to the database
        equipment::create(request(['name', 'description', 'data', 'price']));

        //then redirect to the home page
        return redirect('/admin/equipment');
    }

    public function category(Category $current_category)
    {
        $equipment = Equipment::get()->where('category_id', $current_category->id);
        $categories = Category::get();
        
        return view('admin.equipment.category', compact('equipment','categories','current_category'));
    }
}
