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

    public function edit(Package $package)
    {
        $package::with('equipment');

        $categories = Category::get();
        //get all the equipment from same category as package and leave out all the equipment already in the package (creds to Nick)
        $equipment = Equipment::whereNotIn('id', $package->equipment->pluck('id'))
                                ->where('category_id',$package->category_id)
                                ->select('id','name')
                                ->get();
        

        //get the total price of all linked equipment
        $totalPrice = 0;
        foreach($package->equipment as $packageEquipment){ $totalPrice += $packageEquipment['price']; };

        return view('admin.package.edit', compact('package','categories','equipment','totalPrice'));
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

    public function delete(Request $request, Package $package)
    {
        $category = $package->category_id; //store package category for redirect before removal
        $package->delete();

        return redirect()->route('equipmentCategory', ['id' => $category]);
    }

    public function addEquipment(Request $request, Package $package)
    {
        $package->equipment()->attach($request->equipment_id);

        return back();
    }

    public function removeEquipment(Request $request, Package $package, Equipment $equipment_id)
    {
        $package->equipment()->detach($equipment_id);

        return back();
    }
}
