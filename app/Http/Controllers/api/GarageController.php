<?php

namespace App\Http\Controllers\api;

use App\Garage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GarageController extends Controller
{
    public function index(){
        $garage=Garage::all();
        return $garage;
    }

    public function show($id){
        $garage=Garage::findOrFail($id);
        return $garage;
    }
}
