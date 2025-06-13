<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MidtransController;


Route::get('/', function () {
    return view('welcome');
});

//midtrans
Route::get('/midtrans', function () {
    return view('midtrans');
});

Route::post('/midtrans/checkout', [MidtransController::class, 'checkout']);
