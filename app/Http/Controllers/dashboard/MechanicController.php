<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Mechanic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MechanicController extends Controller
{

    public function index()
    {
        $mechanics=Mechanic::all();
        $mechanics1=Mechanic::first();
        return view('dash.mechanic.index',compact('mechanics','mechanics1'));
    }


    public function create()
    {
        return view('dash.mechanic.create');
    }


    public function store(Request $request)
    {
        $request->validate([
           'name'=>'required',
           'name_ar'=>'required',
           'email'=>'required',
           'location'=>'required',
           'phone'=>'required',
           'img'=>'required|image',
           'national'=>'required',
           'password'=>'required',
        ]);

        if ($request->hasFile('img')){
            Image::make($request->img)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/mechanic/'.$request->img->hashName())) ;
        }

        Mechanic::create([
           'name'=>['en'=>$request->name,'ar'=>$request->name_ar],
           'email'=>$request->email,
           'location'=>$request->location,
           'phone'=>$request->phone,
            'licence'=>$request->img->hashName(),
            'nation_id'=>$request->national,
            'password'=>$request->password,
        ]);

        toastr()->success('Add Successfully');


        return redirect()->route('dash.mechanic.index');


    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $mech=Mechanic::findOrFail($id);

        return view('dash.mechanic.edit',compact('mech'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'location'=>'required',
            'phone'=>'required',
            'img'=>'required|image',
            'national'=>'required',
        ]);

        if ($request->hasFile('img')){
            Image::make($request->img)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/mechanic/'.$request->img->hashName())) ;
        }

        $mech=Mechanic::findOrFail($id);

        $mech->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'location'=>$request->location,
            'phone'=>$request->phone,
            'licence'=>$request->img->hashName(),
            'nation_id'=>$request->national,
        ]);

        toastr()->info('Updated Successfully');

        return redirect()->route('dash.mechanic.index');

    }


    public function destroy($id)
    {
        $mech=Mechanic::findOrFail($id);
        if ($mech->licence){
            Storage::disk('uploads')->delete('/mechanic/'.$mech->licence);
        }

        $mech->delete();

        toastr()->error('Deleted Successfully');

        return redirect()->route('dash.mechanic.index');

    }
}
