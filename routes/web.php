<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/rooms', function () {
    return view('templates/pages/room');
});

Route::get('/news', function () {
    return view('templates/pages/new');
});

Route::get('/booking', function () { // đặt phòng
    return view('templates/pages/booking');
});

Route::get('/checkout', function () { //thanh toán
    return view('templates/pages/checkout');
});

Route::get('/booking_search', function () { //Tìm kếm rooms
    return view('templates/pages/booking_search');
});

//ADMIN
//viết middleware sau ở đây
Route::prefix('admin')->group(function () {

    Route::get('/', function () { //admin
        return view('admin/dashboard');
    });

    Route::prefix('/users')->group(function () {

        Route::get('/', function () { //user
            return view('admin/user/list');
        });
    });

    Route::prefix('/rooms')->group(function () {

        Route::get('/', function () { //room
            return view('admin/user/list');
        });
    });

    // .... countine
});
