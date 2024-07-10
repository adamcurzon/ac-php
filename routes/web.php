<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render("Index");
});

Route::get('/demo', function () {
    return response()->json(["Demo" => "test"]);
});

Route::resource("/data/car", CarController::class);
