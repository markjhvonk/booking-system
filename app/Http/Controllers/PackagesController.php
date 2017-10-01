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
}
