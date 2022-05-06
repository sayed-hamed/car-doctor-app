<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mechanic;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    public function index(){
        $mechanics=Mechanic::all();
        return $mechanics;
    }

    public function show($id){
        $mechanic=Mechanic::findOrFail($id);
        return $mechanic;
    }
}
