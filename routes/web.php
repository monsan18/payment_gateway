<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MidtransController;
use Illuminate\Support\Facades\File;

Route::get('/', function () {
    return view('welcome');
});

//midtrans
Route::get('/midtrans', function () {
    return view('midtrans');
});

Route::post('/midtrans/checkout', [MidtransController::class, 'checkout']);

Route::get('/test', function () {
    \Log::info('✅ Route test jalan!');
    return 'Laravel jalan!';
});


Route::get('/debug-log', function () {
    $log = File::get(storage_path('logs/laravel.log'));
    return "<pre>$log</pre>";
});