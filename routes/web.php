<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;

Route::get('/', [RoomController::class, 'home'])->name('home');

Route::resource('rooms', RoomController::class);