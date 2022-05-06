<?php

namespace App\Http\Controllers\dashboard;

use App\Garage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Yoeunes\Toastr\Toastr;


class GarageController extends Controller
{

    public function index()
    {
        $gars=Garage::all();
        $gar=Garage::first();
        return view('dash.garage.index',compact('gars','gar'));
    }


    public function create()
    {
        return view('dash.garage.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'name_ar'=>'required',
            'phone'=>'required',
            'location'=>'required',
            'img'=>'required|image',
        ]);

        if ($request->hasFile('img')){
            Image::make($request->img)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/garage/'.$request->img->hashName())) ;
        }

        Garage::create([
           'name'=>['en'=>$request->name,'ar'=>$request->name_ar],
           'phone'=>$request->phone,
            'location'=>$request->location,
            'img'=>$request->img->hashName(),
        ]);

        \toastr()->success('Add Successfully');
        return redirect()->route('dash.garage.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $garage=Garage::findOrFail($id);
        return view('dash.garage.edit',compact('garage'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'location'=>'required',
            'phone'=>'required',
            'img'=>'required|image',
        ]);

        $garage=Garage::findOrFail($id);

        if ($request->hasFile('img')){
            Image::make($request->img)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/garage/'.$request->img->hashName())) ;
        }

        $garage->update([
            'name'=>['en'=>$request->name,'ar'=>$request->name_ar],
            'phone'=>$request->phone,
            'location'=>$request->location,
            'img'=>$request->img->hashName(),
        ]);

        \toastr()->info('Updated Successfully');
        return redirect()->route('dash.garage.index');
    }


    public function destroy($id)
    {
        $garage=Garage::findOrFail($id);
        if ($garage->img){
            Storage::disk('uploads')->delete('/garage/'.$garage->img);
        }

        $garage->delete();
        \toastr()->error('Deleted Successfully');
        return redirect()->route('dash.garage.index');

    }
}//end of controller
