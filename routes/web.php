<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/demo', function () {
    return response()->json(["Demo" => "test"]);
});

Route::resource("/data/car", CarController::class);
