<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;

Route::resource('alumnos', AlumnoController::class);
Route::get('/', function () {
    return view('welcome');

});
