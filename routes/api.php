<?php

use App\Http\Controllers\ContactUsController;
use Illuminate\Support\Facades\Route;


Route::post('/contact', [ContactUsController::class, 'store']);;
