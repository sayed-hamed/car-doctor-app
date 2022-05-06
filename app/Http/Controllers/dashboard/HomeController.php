<?php

namespace App\Http\Controllers\dashboard;

use App\Car;
use App\Garage;
use App\Http\Controllers\Controller;
use App\Mechanic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function index(){

        $mech_all=Mechanic::all()->count();
        $garage_all=Garage::all()->count();
        $car_all=Car::all()->count();
        $zero=0;





        $chartjs = app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 400, 'height' => 280])
            ->labels(['Mechanics','Garages','Repair Van'])
            ->datasets([
                [
                    "label" => "CAR DOCTOR SERVICES",
                    'backgroundColor' => ['#e80e0e', '#0c2f91','#e8860e'],
                    'borderColor' => "rgb(247, 250, 250)",
                    "pointBorderColor" => "rgb(247, 250, 250)",
                    "pointBackgroundColor" => "rgb(247, 250, 250)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgb(247, 250, 250)",
                    'data' => [$mech_all,$garage_all,$car_all,$zero],
                ],
            ])
            ->options([]);



        $chartjs1 = app()->chartjs
            ->name('pieChartTest')
            ->type('pie')
            ->size(['width' => 400, 'height' => 280])
            ->labels(['Mechanics','Garages','Repair Van'])
            ->datasets([
                [
                    "label" => "CAR DOCTOR SERVICES",
                    'backgroundColor' => ['#e80e0e', '#0c2f91','#e8860e'],
                    'borderColor' => "rgb(247, 250, 250)",
                    "pointBorderColor" => "rgb(247, 250, 250)",
                    "pointBackgroundColor" => "rgb(247, 250, 250)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgb(247, 250, 250)",
                    'data' => [$mech_all,$garage_all,$car_all,$zero],
                ],
            ])
            ->options([]);





        return view('admin', compact('chartjs','chartjs1'));

    }
}
