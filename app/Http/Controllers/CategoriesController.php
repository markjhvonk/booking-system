<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function create()
    {        
        return view('admin.category.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name'          => 'required|unique:categories,name',
            'description'   => ''
            
        ]);

        // gather data and add it to the database
        category::create(request(['name', 'description']));

        //then redirect to the home page
        return redirect('/admin/equipment');
    }

    public function edit(Category $category){
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        
        $this->validate(request(),[
            'name'          => 'required|unique:categories,name,'.$category->id,
            'description'   => ''
            
        ]);

        $category->update($request->all());

        return back();
    }

    public function delete(Request $request, Category $category){
        
        $category->delete();

        return redirect('/admin/equipment');
    }
}
