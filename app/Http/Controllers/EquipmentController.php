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
        $categories = Category::get();
        
        return view('admin.equipment.create', compact('categories'));
    }

    public function store()
    {
        $this->validate(request(), [
            'name'          => 'required|unique:equipment,name',
            'description'   => '',
            'data'          => '',
            'price'         => '',
            'category_id'   => ''
            
        ]);

        // gather data and add it to the database
        equipment::create(request(['name', 'description', 'data', 'price', 'category_id']));

        //then redirect to the home page
        return redirect('/admin/equipment');
    }

    public function category(Category $current_category)
    {
        $equipment = Equipment::get()->where('category_id', $current_category->id);
        $categories = Category::get();
        
        return view('admin.equipment.category', compact('equipment','categories','current_category'));
    }

    public function edit(Equipment $equipment)
    {        
        $categories = Category::get();
        return view('admin.equipment.edit', compact('equipment', 'categories'));
    }

    public function update(Request $request, Equipment $equipment)
    {
        
        $this->validate(request(),[
            'name'          => 'required|unique:equipment,name,'.$equipment->id,
            'description'   => '',
            'data'          => '',
            'price'         => '',
            'category_id'   => ''
            
        ]);

        $equipment->update($request->all());

        return back();
    }

    public function delete(Request $request, Equipment $equipment)
    {        
        $equipment->delete();
        return back();
    }


}
