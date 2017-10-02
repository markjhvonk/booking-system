<?php

namespace App\Http\Controllers;

use App\equipment;
use App\category;
use App\package;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function create(Category $current_category)
    {
        $categories = Category::get();
        
        return view('admin.package.create', compact('categories','current_category'));
    }

    public function store(Category $current_category)
    {
        $this->validate(request(), [
            'name'          => 'required|unique:packages,name',
            'description'   => '',
            'category_id'   => ''       
        ]);

        // gather data and add it to the database
        Package::create(request(['name', 'description', 'category_id']));

        //then redirect to the home page
        return redirect()->route('equipmentCategory', $current_category);
    }

    public function edit(Package $package){
        $categories = Category::get();
        $totalPrice = 0;
        foreach($package->equipment as $equipment){
            $totalPrice += $equipment['price'];
        };
        return view('admin.package.edit', compact('package','categories','totalPrice'));
    }

    public function update(Request $request, Package $package)
    {
        
        $this->validate(request(),[
            'name'          => 'required|unique:categories,name,'.$package->id,
            'description'   => ''
        ]);

        $package->update($request->all());

        return back();
    }
}
