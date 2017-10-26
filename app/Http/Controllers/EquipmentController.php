<?php

namespace App\Http\Controllers;

use App\equipment;
use App\category;
use App\package;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        
        return view('admin.equipment.index', compact('equipment','categories','packages'));
    }

    public function create(Category $current_category)
    {
        $categories = Category::get();
        
        return view('admin.equipment.create', compact('categories','current_category'));
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
        $current_category::with('equipment', 'package'); // eager load the relations

        $equipment = Equipment::get()->where('category_id', $current_category->id);
        $packages = Package::get()->where('category_id', $current_category->id);
        
        return view('admin.equipment.category', compact('equipment','packages','current_category'));
    }

    public function searchEquipment(Category $current_category, Request $request)
    {
        $current_category::with('equipment', 'package'); // eager load the relations
        $searchQuery = $request->searchQuery;
        $equipment = Equipment::search($searchQuery)->get()->where('category_id', $current_category->id);
        // $equipment = Equipment::get()->where('category_id', $current_category->id);
        $packages = Package::get()->where('category_id', $current_category->id);
        $categories = Category::get();
        
        return view('admin.equipment.category', compact('equipment','packages','categories','current_category', 'searchQuery'));
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

    public function visible(Request $request, Equipment $equipment)
    {
        if($equipment->visible){
            $equipment->update(['visible' => 0]);
        } else {
            $equipment->update(['visible' => 1]);
        }

        return back();
    }


}
