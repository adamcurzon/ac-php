<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get("/car/add", [CarController::class, 'create']);

Route::get('/demo', function () {
    return response()->json(["Demo" => "test"]);
});

Route::resource("/data/car", CarController::class);
