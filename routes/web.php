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
Route::middleware(['auth'])->group(function () {
});

Route::prefix('admin')->group(function () {
    //dashboard
    Route::prefix('/dashboard')->group(function () {
        Route::get('/', 'AdminController@admin')->name('route_BackEnd_Dashboard');
    });
    //booking
    Route::prefix('/bookings')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\BookingController@bookings')->name('route_BackEnd_Bookings_List');
        Route::get('/detail', 'App\Http\Controllers\Admin\BookingController@bookings_detail')->name('route_BackEnd_Bookings_Detail');
    });
    //categories_room
    Route::prefix('/categoryrooms')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\CategoryroomController@categoryrooms')->name('route_BackEnd_Categoryrooms_List');
        Route::match(['get', 'post'], '/add', 'App\Http\Controllers\Admin\CategoryroomController@categoryrooms_add')->name('route_BackEnd_Categoryrooms_Add');
        Route::get('/detail', 'App\Http\Controllers\Admin\CategoryroomController@categoryrooms_detail')->name('route_BackEnd_Categoryrooms_Detail');
        Route::post('/update/{id}', 'App\Http\Controllers\Admin\CategoryroomController@categoryrooms_update')->name('route_BackEnd_Categoryrooms_Update');
        Route::get('/remove/{id}', 'App\Http\Controllers\Admin\CategoryroomController@categoryrooms_remove')->name('route_BackEnd_Categoryrooms_Remove');
    });
    //room
    Route::prefix('/rooms')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\RoomController@rooms')->name('route_BackEnd_Rooms_List');
        Route::match(['get', 'post'], '//add', 'App\Http\Controllers\Admin\RoomController@rooms_add')->name('route_BackEnd_Rooms_Add');
        Route::get('/detail', 'App\Http\Controllers\Admin\RoomController@rooms_detail')->name('route_BackEnd_Rooms_Detail');
        Route::post('/update/{id}', 'App\Http\Controllers\Admin\RoomController@rooms_update')->name('route_BackEnd_Rooms_Update');
        Route::get('/remove/{id}', 'App\Http\Controllers\Admin\RoomController@rooms_remove')->name('route_BackEnd_Rooms_Remove');
    });
    //user
    Route::prefix('/users')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\UserController@users')->name('route_BackEnd_Users_List');
        Route::match(['get', 'post'], '/add', 'App\Http\Controllers\Admin\UserController@users_add')->name('route_BackEnd_Users_Add');
        Route::get('/detail', 'App\Http\Controllers\Admin\UserController@users_detail')->name('route_BackEnd_Users_Detail');
        Route::post('/update/{id}', 'App\Http\Controllers\Admin\UserController@users_update')->name('route_BackEnd_Users_Update');
        Route::get('/remove/{id}', 'App\Http\Controllers\Admin\UserController@users_remove')->name('route_BackEnd_Users_Remove');
    });
    //new
    Route::prefix('/news')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\NewController@news')->name('route_BackEnd_News_List');
        Route::match(['get', 'post'], '/add', 'App\Http\Controllers\Admin\NewController@news_add')->name('route_BackEnd_News_Add');
        Route::get('/detail', 'App\Http\Controllers\Admin\NewController@news_detail')->name('route_BackEnd_News_Detail');
        Route::post('/update/{id}', 'App\Http\Controllers\Admin\NewController@news_update')->name('route_BackEnd_News_Update');
        Route::get('/remove/{id}', 'App\Http\Controllers\Admin\NewController@news_remove')->name('route_BackEnd_News_Remove');
    });
    //employees
    Route::prefix('/employees')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\EmployeesController@employees')->name('route_BackEnd_Employees_List');
        Route::match(['get', 'post'], '/add', 'App\Http\Controllers\Admin\EmployeesController@employees_add')->name('route_BackEnd_Employees_Add');
        Route::get('/detail/{id}', 'App\Http\Controllers\Admin\EmployeesController@employees_detail')->name('route_BackEnd_Employees_Detail');
        Route::post('/update/{id}', 'App\Http\Controllers\Admin\EmployeesController@employees_update')->name('route_BackEnd_Employees_Update');
        Route::get('/remove/{id}', 'App\Http\Controllers\Admin\EmployeesController@employees_remove')->name('route_BackEnd_Employees_Remove');
    });
    //schedule
    Route::prefix('/schedule')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\ScheduleController@schedules')->name('route_BackEnd_Schedule_List');
    });
    //feedback
    Route::prefix('/feedback')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\FeedbackController@feedbacks')->name('route_BackEnd_Feedback_List');
    });
    

    // .... countine
});
