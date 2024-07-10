<?php

namespace App\Http\Controllers;

use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Models\CarManufacture;
use App\Models\CarModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        return Inertia::render("Index", [
            "cars" => $this->getRecentCars(),
            "carsPerManufacture" => $this->carsPerManufacture(),
            "carsPerYear" => $this->carsPerYear(),
            "carCountTotal" => $this->carCountTotal(),
            "carManufactureTotal" => $this->carManufactureTotal(),
            "recentCar" => $this->recentCar(),
        ]);
    }

    public function getRecentCars()
    {
        // return CarResource::collection(Car::orderBy("created_at", "desc")->take(5)->get());
    }

    public function recentCar()
    {
        return Car::orderBy("created_at", "desc")->take(1)->first()->name;
    }

    public function carsPerManufacture()
    {
        $data = Car::select([
            DB::raw('car_manufacture_id'),
            DB::raw('count(*) as count')
        ])
            ->orderBy('count')
            ->groupBy('car_manufacture_id')
            ->get();

        $formattedRecords = $data->map(function ($record) {
            return [
                'manufacture' => CarManufacture::findOrFail($record->car_manufacture_id)->name,
                'count' => $record->count,
            ];
        });

        return $formattedRecords;
    }

    public function carsPerYear()
    {
        $data = Car::select([
            DB::raw('year'),
            DB::raw('count(*) as count')
        ])
            ->orderBy('year')
            ->groupBy('year')
            ->get();

        return $data;
    }

    public function carCountTotal()
    {
        return Car::count();
    }


    public function carManufactureTotal()
    {
        return CarManufacture::count();
    }
}
