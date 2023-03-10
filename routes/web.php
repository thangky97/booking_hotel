<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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


//Chỉ dùng cho đăng nhập
// Route::get('/login1', ['as'=>'login', 'uses'=>'Auth\LoginController@getLogin']) ;
// Route::post('/login1', ['as'=>'login1', 'uses'=>'Auth\LoginController@postLogin']);

Route::middleware('guest')->prefix('/auth')->group(function () {
    Route::get('/login', 'Auth\LoginController@getLogin')->name('getLogin');
    Route::post('/login', 'Auth\LoginController@postLogin')->name('postLogin');

    Route::get('/register', 'Auth\RegisterController@getRegister')->name('getRegister');
    Route::post('/register', 'Auth\RegisterController@postRegister')->name('postRegister');

    // use Laravel\Socialite\Facades\Socialite;
    Route::get('/login-google', 'Auth\LoginController@getLoginGoogle')->name('getLoginGoogle');
    Route::get('/google/callback', 'Auth\LoginController@loginGoogleCallback')->name('loginGoogleCallback');
});
//Đăng xuất
Route::get('/auth/logout', ['as'=>'logout', 'uses'=>'Auth\LoginController@getLogout'])->middleware('auth');
//ADMIN
//viết middleware sau ở đây
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', 'Admin\AdminController@admin')->name('route_BackEnd_Dashboard');
    
    Route::get('/list', 'Admin\AdminController@index')->name('route_BackEnd_Admin_List');
    Route::match(['get', 'post'], '/add', 'Admin\AdminController@add')->name('route_BackEnd_Admin_Add');
    Route::get('/edit/{id}', 'Admin\AdminController@edit')->name('route_BackEnd_Admin_Edit');
    Route::post('/update/{id}', 'Admin\AdminController@update')->name('route_BackEnd_Admin_Update');

    Route::prefix('/users')->group(function () {
        Route::get('/', 'UserController@users')->name('route_BackEnd_Users_List');
        Route::match(['get', 'post'], '/add', 'App\Http\Controllers\Admin\UserController@users_add')->name('route_BackEnd_Users_Add');
        Route::get('/detail', 'App\Http\Controllers\Admin\UserController@users_detail')->name('route_BackEnd_Users_Detail');
        Route::post('/update/{id}', 'App\Http\Controllers\Admin\UserController@users_update')->name('route_BackEnd_Users_Update');
        Route::get('/remove/{id}', 'App\Http\Controllers\Admin\UserController@users_remove')->name('route_BackEnd_Users_Remove');
    });

    Route::prefix('/employees')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\EmployeesController@employees')->name('route_BackEnd_Employees_List');
        Route::match(['get', 'post'], '/add', 'App\Http\Controllers\Admin\EmployeesController@employees_add')->name('route_BackEnd_Employees_Add');
        Route::get('/detail/{id}', 'App\Http\Controllers\Admin\EmployeesController@employees_detail')->name('route_BackEnd_Employees_Detail');
        Route::post('/update/{id}', 'App\Http\Controllers\Admin\EmployeesController@employees_update')->name('route_BackEnd_Employees_Update');
        Route::get('/remove/{id}', 'App\Http\Controllers\Admin\EmployeesController@employees_remove')->name('route_BackEnd_Employees_Remove');
    });

    Route::prefix('/schedule')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\ScheduleController@schedules')->name('route_BackEnd_Schedule_List');
    });

    Route::prefix('/rooms')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\RoomController@rooms')->name('route_BackEnd_Rooms_List');
        Route::match(['get', 'post'], '//add', 'App\Http\Controllers\Admin\RoomController@rooms_add')->name('route_BackEnd_Rooms_Add');
        Route::get('/detail', 'App\Http\Controllers\Admin\RoomController@rooms_detail')->name('route_BackEnd_Rooms_Detail');
        Route::post('/update/{id}', 'App\Http\Controllers\Admin\RoomController@rooms_update')->name('route_BackEnd_Rooms_Update');
        Route::get('/remove/{id}', 'App\Http\Controllers\Admin\RoomController@rooms_remove')->name('route_BackEnd_Rooms_Remove');
    });

    Route::prefix('/categoryrooms')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\CategoryroomController@categoryrooms')->name('route_BackEnd_Categoryrooms_List');
        Route::match(['get', 'post'], '/add', 'App\Http\Controllers\Admin\CategoryroomController@categoryrooms_add')->name('route_BackEnd_Categoryrooms_Add');
        Route::get('/detail', 'App\Http\Controllers\Admin\CategoryroomController@categoryrooms_detail')->name('route_BackEnd_Categoryrooms_Detail');
        Route::post('/update/{id}', 'App\Http\Controllers\Admin\CategoryroomController@categoryrooms_update')->name('route_BackEnd_Categoryrooms_Update');
        Route::get('/remove/{id}', 'App\Http\Controllers\Admin\CategoryroomController@categoryrooms_remove')->name('route_BackEnd_Categoryrooms_Remove');
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

    Route::prefix('/bookings')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\BookingController@bookings')->name('route_BackEnd_Bookings_List');
        Route::get('/detail', 'App\Http\Controllers\Admin\BookingController@bookings_detail')->name('route_BackEnd_Bookings_Detail');
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
        Route::get('/', 'App\Http\Controllers\Admin\FeedbackController@feedbacks')->name('route_BackEnd_Feedback_List');
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
        Route::get('/', 'App\Http\Controllers\Admin\NewController@news')->name('route_BackEnd_News_List');
        Route::match(['get', 'post'], '/add', 'App\Http\Controllers\Admin\NewController@news_add')->name('route_BackEnd_News_Add');
        Route::get('/detail', 'App\Http\Controllers\Admin\NewController@news_detail')->name('route_BackEnd_News_Detail');
        Route::post('/update/{id}', 'App\Http\Controllers\Admin\NewController@news_update')->name('route_BackEnd_News_Update');
        Route::get('/remove/{id}', 'App\Http\Controllers\Admin\NewController@news_remove')->name('route_BackEnd_News_Remove');
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
