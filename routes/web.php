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

Route::get('/', 'Client\HomeController@index')->name('route_FrontEnd_Home');
// Route::get('/', function () {
//     return view('home');
// });
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


Route::get('/sign-in', 'Client\SigninController@getSignin')->name('getSignin');
Route::post('/sign-in', 'Client\SigninController@postSignin')->name('postSignin');
Route::get('/sign-up', 'Client\SignupController@getSignup')->name('getSignup');
Route::post('/sign-up', 'Client\SignupController@postSignup')->name('postSignup');
Route::get('/logout', 'Client\SigninController@logout')->name('logoutUser');

Route::get('/booking_search', 'Client\RoomController@index')->name('route_FontEnd_BookingSearch');//tìm kiếm phòng
Route::post('/booking_search', 'Client\RoomController@search')->name('route_FontEnd_BookingSearch_Search');//Tìm kiếm phòng theo order booking
Route::post('/booking_search/{id}', 'Client\RoomController@search_cate')->name('route_FontEnd_BookingSearch_SearchCate');//Tìm kiếm phòng theo loại phòng

Route::middleware('guest')->prefix('/auth')->group(function () {
    Route::get('/login', 'Auth\LoginController@getLogin')->name('getLogin');
    Route::post('/login', 'Auth\LoginController@postLogin')->name('postLogin');

    Route::get('/register', 'Auth\RegisterController@getRegister')->name('getRegister');
    Route::post('/register', 'Auth\RegisterController@postRegister')->name('postRegister');

    Route::get('/login-google', 'Client\SigninController@getLoginGoogle')->name('getLoginGoogle');
    Route::get('/google/callback', 'Client\SigninController@loginGoogleCallback')->name('loginGoogleCallback');
});
//Đăng xuất
Route::get('/auth/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@getLogout'])->middleware('auth');

//ADMIN
//viết middleware sau ở đây
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    //Route::prefix('admin')->group(function () {

    Route::get('/dashboard', 'Admin\AdminController@admin')->name('route_BackEnd_Dashboard');

    Route::get('/list', 'Admin\AdminController@index')->name('route_BackEnd_Admin_List');
    Route::match(['get', 'post'], '/add', 'Admin\AdminController@add')->name('route_BackEnd_Admin_Add');
    Route::get('/edit/{id}', 'Admin\AdminController@edit')->name('route_BackEnd_Admin_Edit');
    Route::post('/update/{id}', 'Admin\AdminController@update')->name('route_BackEnd_Admin_Update');

    Route::prefix('/users')->group(function () {
        Route::get('/', 'Admin\UserController@index')->name('route_BackEnd_Users_List');
        Route::match(['get', 'post'], '/add', 'Admin\UserController@add')->name('route_BackEnd_Users_Add');
        Route::get('/edit/{id}', 'Admin\UserController@edit')->name('route_BackEnd_Users_Edit');
        Route::post('/update/{id}', 'Admin\UserController@update')->name('route_BackEnd_Users_Update');
        Route::get('/remove/{id}', 'Admin\UserController@remove')->name('route_BackEnd_Users_Remove');
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
        Route::match(['post', 'get'], '/add', 'App\Http\Controllers\Admin\RoomController@rooms_add')->name('route_BackEnd_Rooms_Add');
        Route::get('/detail/{id}', 'App\Http\Controllers\Admin\RoomController@rooms_detail')->name('route_BackEnd_Rooms_Detail');
        Route::post('/update/{id}', 'App\Http\Controllers\Admin\RoomController@rooms_update')->name('route_BackEnd_Rooms_Update');
        Route::get('/remove/{id}', 'App\Http\Controllers\Admin\RoomController@rooms_remove')->name('route_BackEnd_Rooms_Remove');
    });

    Route::prefix('/categoryrooms')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\CategoryroomController@index')->name('route_BackEnd_Categoryrooms_List');
        Route::get('/addForm', 'App\Http\Controllers\Admin\CategoryroomController@addForm')->name('route_BackEnd_Categoryrooms_Add');
        Route::post('/saveAddForm', 'App\Http\Controllers\Admin\CategoryroomController@saveAdd')->name('route_BackEnd_Categoryrooms_saveAdd');
        Route::get('/editForm/{id}', 'App\Http\Controllers\Admin\CategoryroomController@editForm')->name('route_BackEnd_Categoryrooms_Detail');
        Route::put('/editForm/{id}', 'App\Http\Controllers\Admin\CategoryroomController@saveEdit')->name('route_BackEnd_Categoryrooms_Update');
        Route::get('/delete/{id}', 'App\Http\Controllers\Admin\CategoryroomController@destroy')->name('route_BackEnd_Categoryrooms_Delete');
        Route::delete('/deleteimages/{id}',[\App\Http\Controllers\Admin\CategoryRoomController::class,'deleteimages'])->name('route_BackEnd_Categoryrooms_DeleteImgs');


    });

    Route::prefix('/property_room')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\PropertyRoomController@propertyrooms')->name('route_BackEnd_PropertyRoom_list');
        Route::get('/add', 'App\Http\Controllers\Admin\PropertyRoomController@add')->name('route_BackEnd_PropertyRoom_add');
        Route::post('/create', 'App\Http\Controllers\Admin\PropertyRoomController@create')->name('route_BackEnd_PropertyRoom_create');
        Route::get('/edit/{id}', 'App\Http\Controllers\Admin\PropertyRoomController@edit')->name('route_BackEnd_PropertyRoom_edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Admin\PropertyRoomController@update')->name('route_BackEnd_PropertyRoom_update');
    });

    Route::prefix('/properties')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\PropertiesController@index')
            ->name('route_BackEnd_properties_List');
        Route::get('/addForm', 'App\Http\Controllers\Admin\PropertiesController@addForm')
            ->name('route_BackEnd_properties_Add');
        Route::post('/saveAddForm', 'App\Http\Controllers\Admin\PropertiesController@saveAdd')->name('route_BackEnd_properties_saveAdd');
        Route::get('/editForm/{id}', 'App\Http\Controllers\Admin\PropertiesController@editForm')->name('route_BackEnd_properties_Detail');
        Route::post('/editForm/{id}', 'App\Http\Controllers\Admin\PropertiesController@saveEdit')->name('route_BackEnd_properties_Update');
        Route::get('/delete/{id}', 'App\Http\Controllers\Admin\PropertiesController@destroy')->name('route_BackEnd_properties_Delete');
    });


    Route::prefix('/bookings')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\BookingController@bookings')->name('route_BackEnd_Bookings_List');
        Route::get('/add/{id}', 'App\Http\Controllers\Admin\BookingController@add')->name('route_BackEnd_Bookings_Add');
        Route::get('/adduser', 'App\Http\Controllers\Admin\BookingController@adduser')->name('route_BackEnd_Bookings_Adduser');
        Route::post('/create/{id}', 'App\Http\Controllers\Admin\BookingController@create')->name('route_BackEnd_Bookings_Create');
        Route::post('/createuser', 'App\Http\Controllers\Admin\BookingController@createuser')->name('route_BackEnd_Bookings_Createuser');
        Route::get('/detail/{id}', 'App\Http\Controllers\Admin\BookingController@bookings_detail')->name('route_BackEnd_Bookings_Detail');
        Route::post('/updatepay/{id}', 'App\Http\Controllers\Admin\BookingController@updatepay')->name('route_BackEnd_Bookings_Updatepay');
        
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
        Route::get('/{id}', 'App\Http\Controllers\Admin\BillController@bill')->name('route_BackEnd_Bill');
        
    });

    Route::prefix('/bill_detail')->group(function () {
        Route::get('/{id}', 'App\Http\Controllers\Admin\BillDetailController@bill_detail')->name('route_BackEnd_BillDetail');
    });

    Route::prefix('/services')->group(function () {

        Route::get('/', 'App\Http\Controllers\Admin\ServiceController@service')->name('route_BackEnd_Service_List');
        Route::match(['post','get'], '/add', 'App\Http\Controllers\Admin\ServiceController@service_add')->name('route_BackEnd_Service_Add');
        Route::get('/detail/{id}', 'App\Http\Controllers\Admin\ServiceController@service_detail')->name('route_BackEnd_Service_Detail');
        Route::post('/update/{id}', 'App\Http\Controllers\Admin\ServiceController@service_update')->name('route_BackEnd_Service_Update');
        Route::get('/remove/{id}', 'App\Http\Controllers\Admin\ServiceController@service_remove')->name('route_BackEnd_Service_Remove');
    });

    Route::prefix('/feedback')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\FeedbackController@feedbacks')->name('route_BackEnd_Feedback_List');
    });

    Route::prefix('/banner')->group(function () {

        Route::get('/', 'App\Http\Controllers\Admin\BannerController@banner')->name('route_BackEnd_Banner_List');
        Route::match(['post','get'], '/add', 'App\Http\Controllers\Admin\BannerController@banner_add')->name('route_BackEnd_Banner_Add');
        Route::get('/detail/{id}', 'App\Http\Controllers\Admin\BannerController@banner_detail')->name('route_BackEnd_Banner_Detail');
        Route::post('/update/{id}', 'App\Http\Controllers\Admin\BannerController@banner_update')->name('route_BackEnd_Banner_Update');
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
