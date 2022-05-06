<?php

namespace App\Http\Controllers\dashboard;

use App\Car;
use App\Http\Controllers\Controller;
use App\Mechanic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CarController extends Controller
{

    public function index()
    {
        $mechanics=Car::all();
        $mechanics1=Car::first();
        return view('dash.car.index',compact('mechanics','mechanics1'));
    }


    public function create()
    {
        return view('dash.car.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'name_ar'=>'required',
            'phone'=>'required',
            'location'=>'required',
            'img'=>'required|image',
            'national'=>'required',
        ]);

        if ($request->hasFile('img')){
            Image::make($request->img)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/car/'.$request->img->hashName())) ;
        }

        Car::create([
            'name'=>['en'=>$request->name,'ar'=>$request->name_ar],
            'phone'=>$request->phone,
            'img'=>$request->img->hashName(),
            'national'=>$request->national,
            'location'=>$request->location,
        ]);

        toastr()->success('Add Successfully');


        return redirect()->route('dash.car.index');


    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $mech=Car::findOrFail($id);

        return view('dash.car.edit',compact('mech'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'location'=>'required',
            'img'=>'required|image',
            'national'=>'required',
        ]);

        if ($request->hasFile('img')){
            Image::make($request->img)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/car/'.$request->img->hashName())) ;
        }

        $mech=Car::findOrFail($id);

        $mech->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'location'=>$request->location,
            'img'=>$request->img->hashName(),
            'national'=>$request->national,
        ]);

        toastr()->info('Updated Successfully');

        return redirect()->route('dash.car.index');

    }


    public function destroy($id)
    {
        $mech=Car::findOrFail($id);
        if ($mech->img){
            Storage::disk('uploads')->delete('/car/'.$mech->img);
        }

        $mech->delete();

        toastr()->error('Deleted Successfully');

        return redirect()->route('dash.car.index');

    }
}
