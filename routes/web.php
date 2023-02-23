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

Route::get('/room_detail', function () {
    return view('templates/pages/room_detail');
});

Route::get('/news', function () {
    return view('templates/pages/new');
});

Route::get('/new_detail', function () {
    return view('templates/pages/new_detail');
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

    Route::get('/dashboard', function () {
        return view('admin/dashboard');
    });

    Route::get('/', function () {
        return view('admin/admin/list');
    });
    Route::get('/create', function () {
        return view('admin/admin/create');
    });
    Route::post('/store', function () {
        return view('admin/admin/store');
    });
    Route::get('/edit', function () {
        return view('admin/admin/edit');
    });
    Route::post('/update', function () {
        return view('admin/admin/update');
    });

    Route::prefix('/users')->group(function () {
        Route::get('/', function () {
            return view('admin/user/list');
        });
        Route::get('/create', function () {
            return view('admin/user/create');
        });
        Route::post('/store', function () {
            return view('admin/user/store');
        });
        Route::get('/edit', function () {
            return view('admin/user/edit');
        });
        Route::post('/update', function () {
            return view('admin/user/update');
        });
    });

    Route::prefix('/rooms')->group(function () {
        Route::get('/', function () { //room
            return view('admin/rooms/list');
        });
        Route::get('/create', function () {
            return view('admin/rooms/create');
        });
        Route::post('/store', function () {
            return view('admin/rooms/store');
        });
        Route::get('/edit', function () {
            return view('admin/rooms/edit');
        });
        Route::post('/update', function () {
            return view('admin/rooms/update');
        });
    });

    Route::prefix('/category_room')->group(function () {
        Route::get('/', function () { //cate_room
            return view('admin/category_room/list');
        });
        Route::get('/create', function () {
            return view('admin/category_room/create');
        });
        Route::post('/store', function () {
            return view('admin/category_room/store');
        });
        Route::get('/edit', function () {
            return view('admin/category_room/edit');
        });
        Route::post('/update', function () {
            return view('admin/category_room/update');
        });
    });

    Route::prefix('/property_room')->group(function () {
        Route::get('/', function () { //property_room
            return view('admin/property_room/list');
        });
        Route::get('/create', function () {
            return view('admin/property_room/create');
        });
        Route::post('/store', function () {
            return view('admin/property_room/store');
        });
        Route::get('/edit', function () {
            return view('admin/property_room/edit');
        });
        Route::post('/update', function () {
            return view('admin/property_room/update');
        });
    });

    Route::prefix('/properties')->group(function () {
        Route::get('/', function () { //properties
            return view('admin/properties/list');
        });
        Route::get('/create', function () {
            return view('admin/properties/create');
        });
        Route::post('/store', function () {
            return view('admin/properties/store');
        });
        Route::get('/edit', function () {
            return view('admin/properties/edit');
        });
        Route::post('/update', function () {
            return view('admin/properties/update');
        });
    });

    Route::prefix('/booking')->group(function () {
        Route::get('/', function () {
            return view('admin/booking/list');
        });
        Route::get('/create', function () {
            return view('admin/booking/create');
        });
        Route::post('/store', function () {
            return view('admin/booking/store');
        });
        Route::get('/edit', function () {
            return view('admin/booking/edit');
        });
        Route::post('/update', function () {
            return view('admin/booking/update');
        });
    });

    Route::prefix('/booking_detail')->group(function () {
        Route::get('/', function () {
            return view('admin/booking_detail/list');
        });
        Route::get('/create', function () {
            return view('admin/booking_detail/create');
        });
        Route::post('/store', function () {
            return view('admin/booking_detail/store');
        });
        Route::get('/edit', function () {
            return view('admin/booking_detail/edit');
        });
        Route::post('/update', function () {
            return view('admin/booking_detail/update');
        });
    });

    Route::prefix('/bills')->group(function () {
        Route::get('/', function () {
            return view('admin/bills/list');
        });
        Route::get('/create', function () {
            return view('admin/bills/create');
        });
        Route::post('/store', function () {
            return view('admin/bills/store');
        });
        Route::get('/edit', function () {
            return view('admin/bills/edit');
        });
        Route::post('/update', function () {
            return view('admin/bills/update');
        });
    });

    Route::prefix('/bill_detail')->group(function () {
        Route::get('/', function () {
            return view('admin/bill_detail/list');
        });
        Route::get('/create', function () {
            return view('admin/bill_detail/create');
        });
        Route::post('/store', function () {
            return view('admin/bill_detail/store');
        });
        Route::get('/edit', function () {
            return view('admin/bill_detail/edit');
        });
        Route::post('/update', function () {
            return view('admin/bill_detail/update');
        });
    });

    Route::prefix('/services')->group(function () {
        Route::get('/', function () {
            return view('admin/services/list');
        });
        Route::get('/create', function () {
            return view('admin/services/create');
        });
        Route::post('/store', function () {
            return view('admin/services/store');
        });
        Route::get('/edit', function () {
            return view('admin/services/edit');
        });
        Route::post('/update', function () {
            return view('admin/services/update');
        });
    });

    Route::prefix('/feedback')->group(function () {
        Route::get('/', function () {
            return view('admin/feedback/list');
        });
        Route::get('/create', function () {
            return view('admin/feedback/create');
        });
        Route::post('/store', function () {
            return view('admin/feedback/store');
        });
        Route::get('/edit', function () {
            return view('admin/feedback/edit');
        });
        Route::post('/update', function () {
            return view('admin/feedback/update');
        });
    });

    Route::prefix('/banner')->group(function () {
        Route::get('/', function () {
            return view('admin/banner/list');
        });
        Route::get('/create', function () {
            return view('admin/banner/create');
        });
        Route::post('/store', function () {
            return view('admin/banner/store');
        });
        Route::get('/edit', function () {
            return view('admin/banner/edit');
        });
        Route::post('/update', function () {
            return view('admin/banner/update');
        });
    });

    Route::prefix('/contact')->group(function () {
        Route::get('/', function () {
            return view('admin/contact/list');
        });
        Route::get('/create', function () {
            return view('admin/contact/create');
        });
        Route::post('/store', function () {
            return view('admin/contact/store');
        });
        Route::get('/edit', function () {
            return view('admin/contact/edit');
        });
        Route::post('/update', function () {
            return view('admin/contact/update');
        });
    });

    Route::prefix('/news')->group(function () {
        Route::get('/', function () {
            return view('admin/news/list');
        });
        Route::get('/create', function () {
            return view('admin/news/create');
        });
        Route::post('/store', function () {
            return view('admin/news/store');
        });
        Route::get('/edit', function () {
            return view('admin/news/edit');
        });
        Route::post('/update', function () {
            return view('admin/news/update');
        });
    });

    Route::prefix('/category_new')->group(function () {
        Route::get('/', function () {
            return view('admin/category_new/list');
        });
        Route::get('/create', function () {
            return view('admin/category_new/create');
        });
        Route::post('/store', function () {
            return view('admin/category_new/store');
        });
        Route::get('/edit', function () {
            return view('admin/category_new/edit');
        });
        Route::post('/update', function () {
            return view('admin/category_new/update');
        });
    });

    Route::prefix('/vouchers')->group(function () {
        Route::get('/', function () {
            return view('admin/vouchers/list');
        });
        Route::get('/create', function () {
            return view('admin/vouchers/create');
        });
        Route::post('/store', function () {
            return view('admin/vouchers/store');
        });
        Route::get('/edit', function () {
            return view('admin/vouchers/edit');
        });
        Route::post('/update', function () {
            return view('admin/vouchers/update');
        });
    });
});
