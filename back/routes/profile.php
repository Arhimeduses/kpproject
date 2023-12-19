<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/profile/orders', [ProfileController::class,'GetUserOrders']);
Route::get('/profile/user', [ProfileController::class,'GetUserData']);