<?php

namespace App\Http\Controllers\api;

use App\Car;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(){
        $cars=Car::all();
        return $cars;
    }

    public function show($id){
        $car=Car::findOrFail($id);
        return $car;
    }
}

