<?php

namespace App\Http\Controllers;

use App\equipment;
use App\package;
use App\studio;
use App\photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudiosController extends Controller
{
    public function index()
    {
        $studios = Studio::with('photo')->oldest()->get();
        // $studioPhoto = $studios->photo->first();
        
        return view('admin.studios.index', compact('studios'));
    }

    public function studio(Studio $studio)
    {
        $studio::with('equipment', 'package', 'photo'); //eager load the relations
        

        $otherEquipments = Equipment::whereNotIn('id', $studio->equipment->pluck('id'))
        ->select('id','name')
        ->get(); // Load in all the Equipment that is not yet related to this model
        $otherPackages = Package::whereNotIn('id', $studio->package->pluck('id'))
        ->select('id','name')
        ->get(); // Load in all the Packages that is not yet related to this model

        return view('admin.studios.studio', compact('studio', 'otherEquipments', 'otherPackages'));
    }

    public function create()
    {
        return view('admin.studios.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name'          => 'required|unique:studios,name',
            'info'          => 'required',
            'specs'         => 'required',
            'location'      => 'required',
            'assistance'    => ''
            
        ]);

        // gather data and add it to the database
        studio::create(request(['name', 'info', 'specs', 'location', 'assistance']));

        //then redirect to the home page
        return redirect('/admin/studios');
    }

    public function edit(Studio $studio){
        return view('admin.studios.edit', compact('studio'));
    }

    public function update(Request $request, Studio $studio)
    {
        
        $this->validate(request(),[
            'name'          => 'required|unique:studios,name,'.$studio->id,
            'info'          => 'required',
            'specs'         => 'required',
            'cover_photo'   => '',
            'location'      => 'required',
            'assistance'    => ''
            
        ]);

        $studio->update($request->all());

        return back();
    }

    public function delete(Request $request, Studio $studio)
    {
        
        $studio->delete();

        return redirect('/admin/studios');
    }

    public function addEquipment(Request $request, Studio $studio)
    {
        $studio->equipment()->attach($request->equipment_id);

        return back();
    }

    public function removeEquipment(Request $request, Studio $studio, Equipment $equipment_id)
    {
        $studio->equipment()->detach($request->equipment_id);

        return back();
    }

    public function addPackage(Request $request, Studio $studio)
    {
        $studio->package()->attach($request->package_id);

        return back();
    }

    public function removePackage(Request $request, Studio $studio, Package $package_id)
    {
        $studio->package()->detach($request->package_id);

        return back();
    }

    public function addPhoto(Request $request)
    {
        $this->validate(request(), [
            'name'          => 'required',
            'caption'       => '',
            'file_name'     => '',
            'url'           => 'required',
            'studio_id'     => 'required'
        ]);

        // store image
        $path = $request->file('url')->store('studio_photos', 'public');
        $photo_name = $request->file('url')->hashName();
        // dd($photo_name, $path);

        // gather data and add it to the database
        $photo = photo::create(['name'=>$request->name, 'caption'=>$request->caption, 'file_name'=>$photo_name, 'url'=>$path, 'studio_id'=>$request->studio_id]);
        return back();
    }

    public function removePhoto(Request $request, Studio $studio, Photo $photo)
    {
        if(Storage::disk('public')->delete('studio_photos/'.$photo->file_name)){
            $photo->delete();
            return back();
        } else {
            echo('Áint working boii!');
        }
    }

    public function visible(Request $request, Studio $studio)
    {
        if($studio->visible){
            $studio->update(['visible' => 0]);
        } else {
            $studio->update(['visible' => 1]);
        }

        return back();
    }

}
