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
    return view('templates/test.master');
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

    Route::get('/list', 'AdminController@index')->name('route_BackEnd_Admin_index');
    
    Route::get('/add', 'AdminController@add')->name('route_BackEnd_Admin_add');
    
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
        Route::get('/', 'UserController@index')->name('route_BackEnd_User_index');
        Route::get('/add', 'UserController@add')->name('route_BackEnd_User_add');
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
        Route::get('/', 'RoomController@index')->name('route_BackEnd_Room_index');
        Route::get('/add', 'RoomController@add')->name('route_BackEnd_Room_add');
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
        Route::get('/', 'CategoryRoomController@index')->name('route_BackEnd_Category_Room_index');
        Route::get('/add', 'CategoryRoomController@add')->name('route_BackEnd_Category_Room_add');
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
        Route::get('/', 'PropertyRoomController@index')->name('route_BackEnd_Property_Room_index');
        Route::get('/add', 'PropertyRoomController@add')->name('route_BackEnd_Property_Room_add');
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
        Route::get('/', 'PropertyController@index')->name('route_BackEnd_Property_index');
        Route::get('/add', 'PropertyController@add')->name('route_BackEnd_Property_add');
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
        Route::get('/', 'BookingController@index')->name('route_BackEnd_Booking_index');
        Route::get('/add', 'BookingController@add')->name('route_BackEnd_Booking_add');
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
        Route::get('/', 'BookingDetailController@index')->name('route_BackEnd_Booking_Detail_index');
        Route::get('/add', 'BookingDetailController@add')->name('route_BackEnd_Booking_Detail_add');
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
        Route::get('/', 'BillController@index')->name('route_BackEnd_Bill_index');
        Route::get('/add', 'BillController@add')->name('route_BackEnd_Bill_add');
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
        Route::get('/', 'BillDetailController@index')->name('route_BackEnd_Bill_Detail_index');
        Route::get('/add', 'BillDetailController@add')->name('route_BackEnd_Bill_Detail_add');
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
        Route::get('/', 'ServiceController@index')->name('route_BackEnd_Service_index');
        Route::get('/add', 'ServiceController@add')->name('route_BackEnd_Service_add');
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
        Route::get('/', 'FeedbackController@index')->name('route_BackEnd_Feedback_index');
        Route::get('/add', 'FeedbackController@add')->name('route_BackEnd_Feedback_add');
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
        Route::get('/', 'BannerController@index')->name('route_BackEnd_Banner_index');
        Route::get('/add', 'BannerController@add')->name('route_BackEnd_Banner_add');
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
        Route::get('/', 'ContactController@index')->name('route_BackEnd_Contact_index');
        Route::get('/add', 'ContactController@add')->name('route_BackEnd_Contact_add');
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
        Route::get('/', 'NewController@index')->name('route_BackEnd_New_index');
        Route::get('/add', 'NewController@add')->name('route_BackEnd_New_add');
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
        Route::get('/', 'CategoryNewController@index')->name('route_BackEnd_Category_New_index');
        Route::get('/add', 'CategoryNewController@add')->name('route_BackEnd_Category_New_add');
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
        Route::get('/', 'VoucherController@index')->name('route_BackEnd_Voucher_index');
        Route::get('/add', 'VoucherController@add')->name('route_BackEnd_Voucher_add');
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
