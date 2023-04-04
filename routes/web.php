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
//cong thanh toan
Route::post('/vnpay_payment','paymentController@vnpay_payment');


Route::get('/', 'Client\HomeController@index')->name('route_FrontEnd_Home');

Route::get('/rooms', 'Client\RoomController@cateroom')->name('route_FrontEnd_Room');
Route::get('/room/detail/{id}', 'Client\RoomController@roomdetail')->name('route_FrontEnd_Room_RoomDetail');

Route::get('/123mail', function () {
    return view('email/booking');
});
Route::get('/rooms/detail/{id}', 'Client\RoomController@detail')->name('route_FrontEnd_Room_Detail');


Route::get('/news', 'Client\NewController@index')->name('route_FrontEnd_News');
Route::get('/news/detail/{id}', 'Client\NewController@detail')->name('route_FrontEnd_New_Detail');

Route::get('/feedback', 'Client\FeedbackController@feedback')->name('route_FontEnd_Feedback');

Route::get('/contact', function () {
    return view('templates/pages/contact');
});

Route::get('/profile/{id}', 'Client\UserController@index')->name('route_FrontEnd_User_Profile');

Route::get('/about', function () {
    return view('templates/pages/about');
});

Route::get('/services', 'Client\ServiceController@index')->name('route_FrontEnd_Service');

Route::post('/autobooking', 'Client\BookingController@autobooking')->name('route_FontEnd_Booking_autoBooking');//Giỏ hàng
Route::post('/booking', 'Client\BookingController@booking')->name('route_FontEnd_Booking_Booking');//Giỏ hàng
Route::post('/checkout', 'Client\BookingController@createbooking')->name('route_FontEnd_Booking_createBooking');


Route::get('/sign-in', 'Client\SigninController@getSignin')->name('getSignin');
Route::post('/sign-in', 'Client\SigninController@postSignin')->name('postSignin');
Route::get('/sign-up', 'Client\SignupController@getSignup')->name('getSignup');
Route::post('/sign-up', 'Client\SignupController@postSignup')->name('postSignup');
Route::get('/logout', 'Client\SigninController@logout')->name('logoutUser');

Route::get('/booking_search', 'Client\RoomController@index')->name('route_FontEnd_BookingSearch'); //tìm kiếm phòng
Route::post('/booking_search', 'Client\RoomController@search')->name('route_FontEnd_BookingSearch_Search'); //Tìm kiếm phòng theo order booking
Route::get('/booking_search/{id}', 'Client\RoomController@search_cate')->name('route_FontEnd_BookingSearch_SearchCate'); //Tìm kiếm phòng theo loại phòng

Route::middleware('guest')->prefix('/auth')->group(function () {
    Route::get('/login', 'Auth\LoginController@getLogin')->name('getLogin');
    Route::post('/login', 'Auth\LoginController@postLogin')->name('postLogin');

    Route::get('/register', 'Auth\RegisterController@getRegister')->name('getRegister');
    Route::post('/register', 'Auth\RegisterController@postRegister')->name('postRegister');

    Route::get('/login-google', 'Client\SigninController@getLoginGoogle')->name('getLoginGoogle');
    Route::get('/google/callback', 'Client\SigninController@loginGoogleCallback')->name('loginGoogleCallback');
});

Route::get('/auth/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@getLogout'])->middleware('auth');

Route::get('404', 'ErrorController@error404')->name('404');
Route::get('403', 'ErrorController@error403')->name('403');

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
   
    Route::get('/dashboard', 'Admin\AdminController@admin')->name('route_BackEnd_Dashboard');

    Route::prefix('/profile')->group(function () {
        Route::get('/edit/{id}', 'Admin\ProfileController@edit')->name('route_BackEnd_Profile_Edit');
        Route::post('/update/{id}', 'Admin\ProfileController@update')->name('route_BackEnd_Profile_Update');
    });

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

    Route::prefix('/schedule')->group(function () {
        Route::get('/', 'Admin\ScheduleController@schedules')->name('route_BackEnd_Schedule_List');
    });

    Route::prefix('/rooms')->group(function () {
        Route::get('/', 'Admin\RoomController@rooms')->name('route_BackEnd_Rooms_List');
        Route::match(['post', 'get'], '/add', 'Admin\RoomController@rooms_add')->name('route_BackEnd_Rooms_Add');
        Route::get('/detail/{id}', 'Admin\RoomController@rooms_detail')->name('route_BackEnd_Rooms_Detail');
        Route::post('/update/{id}', 'Admin\RoomController@rooms_update')->name('route_BackEnd_Rooms_Update');
        Route::get('/remove/{id}', 'Admin\RoomController@rooms_remove')->name('route_BackEnd_Rooms_Remove');
    });

    Route::prefix('/categoryrooms')->group(function () {
        Route::get('/', 'Admin\CategoryroomController@index')->name('route_BackEnd_Categoryrooms_List');
        Route::get('/add', 'Admin\CategoryroomController@addForm')->name('route_BackEnd_Categoryrooms_Add');
        Route::post('/saveAdd', 'Admin\CategoryroomController@saveAdd')->name('route_BackEnd_Categoryrooms_saveAdd');
        Route::get('/editForm/{id}', 'Admin\CategoryroomController@editForm')->name('route_BackEnd_Categoryrooms_Detail');
        Route::put('/editForm/{id}', 'Admin\CategoryroomController@saveEdit')->name('route_BackEnd_Categoryrooms_Update');
        Route::get('/delete/{id}', 'Admin\CategoryroomController@destroy')->name('route_BackEnd_Categoryrooms_Delete');
        Route::delete('/deleteimages/{id}', [\App\Http\Controllers\Admin\CategoryRoomController::class, 'deleteimages'])->name('route_BackEnd_Categoryrooms_DeleteImgs');
    });

    Route::prefix('/property_room')->group(function () {
        Route::get('/', 'Admin\PropertyRoomController@propertyrooms')->name('route_BackEnd_PropertyRoom_list');
        Route::get('/add', 'Admin\PropertyRoomController@add')->name('route_BackEnd_PropertyRoom_add');
        Route::post('/create', 'Admin\PropertyRoomController@create')->name('route_BackEnd_PropertyRoom_create');
        Route::get('/edit/{id}', 'Admin\PropertyRoomController@edit')->name('route_BackEnd_PropertyRoom_edit');
        Route::post('/update/{id}', 'Admin\PropertyRoomController@update')->name('route_BackEnd_PropertyRoom_update');
    });

    Route::prefix('/properties')->group(function () {
        Route::get('/', 'Admin\PropertiesController@index')
            ->name('route_BackEnd_properties_List');
        Route::get('/addForm', 'Admin\PropertiesController@addForm')
            ->name('route_BackEnd_properties_Add');
        Route::post('/saveAddForm', 'Admin\PropertiesController@saveAdd')->name('route_BackEnd_properties_saveAdd');
        Route::get('/editForm/{id}', 'Admin\PropertiesController@editForm')->name('route_BackEnd_properties_Detail');
        Route::post('/editForm/{id}', 'Admin\PropertiesController@saveEdit')->name('route_BackEnd_properties_Update');
        Route::get('/delete/{id}', 'Admin\PropertiesController@destroy')->name('route_BackEnd_properties_Delete');
    });

    Route::prefix('/bookings')->group(function () {
        Route::get('/', 'Admin\BookingController@bookings')->name('route_BackEnd_Bookings_List');
        Route::get('/add/{id}', 'Admin\BookingController@add')->name('route_BackEnd_Bookings_Add');
        Route::get('/adduser', 'Admin\BookingController@adduser')->name('route_BackEnd_Bookings_Adduser');
        Route::get('/addservice/{id}', 'Admin\BookingController@addservice')->name('route_BackEnd_Bookings_Addservice');
        Route::get('/editservice/{id}', 'Admin\BookingController@editservice')->name('route_BackEnd_Bookings_Editservice');
        Route::post('/create/{id}', 'Admin\BookingController@create')->name('route_BackEnd_Bookings_Create');
        Route::post('/createuser', 'Admin\BookingController@createuser')->name('route_BackEnd_Bookings_Createuser');
        Route::post('/createservice/{id}', 'Admin\BookingController@createservice')->name('route_BackEnd_Bookings_Createservice');
        Route::get('/detail/{id}', 'Admin\BookingController@bookings_detail')->name('route_BackEnd_Bookings_Detail');
        Route::post('/updatepay/{id}', 'Admin\BookingController@updatepay')->name('route_BackEnd_Bookings_Updatepay');

        Route::post('/updateservice/{id}', 'Admin\BookingController@updateservice')->name('route_BackEnd_Bookings_Updateservice');
        Route::get('/history/{id}', 'App\Http\Controllers\Admin\BookingController@history')->name('route_BackEnd_Bookings_History');
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
        

        Route::get('/', 'Admin\BillController@index')->name('route_BackEnd_Bill_List');
        Route::get('/rooms/{id}', 'Admin\BillController@bill_room')->name('route_BackEnd_Bill_Room');
        Route::get('/services/{id}', 'Admin\BillController@bill_service')->name('route_BackEnd_Bill_Service');

        Route::match(['get', 'post'], '/{id}', 'App\Http\Controllers\Admin\BillController@bills')->name('route_BackEnd_Bill');

        //print_order
        Route::get('/print_order/{id}', 'Admin\BillController@print_order')->name('printOrder');
    });

    Route::prefix('/bill_detail')->group(function () {
        // Route::get('/{id}', 'Admin\BillDetailController@bill_detail')->name('route_BackEnd_BillDetail');
    });

    Route::prefix('/services')->group(function () {

        Route::get('/', 'Admin\ServiceController@service')->name('route_BackEnd_Service_List');
        Route::match(['post', 'get'], '/add', 'Admin\ServiceController@service_add')->name('route_BackEnd_Service_Add');
        Route::get('/detail/{id}', 'Admin\ServiceController@service_detail')->name('route_BackEnd_Service_Detail');
        Route::post('/update/{id}', 'Admin\ServiceController@service_update')->name('route_BackEnd_Service_Update');
        Route::get('/remove/{id}', 'Admin\ServiceController@service_remove')->name('route_BackEnd_Service_Remove');
    });

    Route::prefix('/service_room')->group(function () {
        Route::get('/', 'Admin\ServiceRoomController@service_rooms')->name('route_BackEnd_ServiceRoom_list');
        Route::get('/add', 'Admin\ServiceRoomController@add')->name('route_BackEnd_ServiceRoom_add');
        Route::post('/create', 'Admin\ServiceRoomController@create')->name('route_BackEnd_ServiceRoom_create');
        Route::get('/edit/{id}', 'Admin\ServiceRoomController@edit')->name('route_BackEnd_ServiceRoom_edit');
        Route::post('/update/{id}', 'Admin\ServiceRoomController@update')->name('route_BackEnd_ServiceRoom_update');
    });

    Route::prefix('/feedback')->group(function () {
        Route::get('/', 'Admin\FeedbackController@feedbacks')->name('route_BackEnd_Feedback_List');
    });

    Route::prefix('/banner')->group(function () {

        Route::get('/', 'Admin\BannerController@banner')->name('route_BackEnd_Banner_List');
        Route::match(['post', 'get'], '/add', 'Admin\BannerController@banner_add')->name('route_BackEnd_Banner_Add');
        Route::get('/detail/{id}', 'Admin\BannerController@banner_detail')->name('route_BackEnd_Banner_Detail');
        Route::post('/update/{id}', 'Admin\BannerController@banner_update')->name('route_BackEnd_Banner_Update');
        Route::get('/remove/{id}', 'Admin\BannerController@banner_remove')->name('route_BackEnd_Banner_Remove');
    });

    Route::prefix('/contact')->group(function () {
        Route::get('/', 'Admin\ContactController@index')->name('route_BackEnd_Contact_List');
        Route::get('/detail/{id}', 'Admin\ContactController@editForm')->name('route_BackEnd_Contact_Detail');
        Route::post('/detail/{id}', 'Admin\ContactController@saveEdit')->name('route_BackEnd_Contact_Update');
        Route::get('/remove/{id}', 'Admin\ContactController@destroy')->name('route_BackEnd_Contact_Remove');
    });

    Route::prefix('/news')->group(function () {
        Route::get('/', 'Admin\NewsController@index')->name('route_BackEnd_News_List');
        Route::get('/add', 'Admin\NewsController@addForm')->name('route_BackEnd_News_Add');
        Route::post('/saveAddForm', 'Admin\NewsController@saveAdd')->name('route_BackEnd_News_saveAdd');
        Route::get('/detail/{id}', 'Admin\NewsController@editForm')->name('route_BackEnd_News_Detail');
        Route::post('/detail/{id}', 'Admin\NewsController@saveEdit')->name('route_BackEnd_News_Update');
    });

    Route::prefix('/category_news')->group(function () {
        Route::get('/', 'Admin\CategoryNewController@index')->name('route_BackEnd_Category_News_List');
        Route::get('/add', 'Admin\CategoryNewController@addForm')->name('route_BackEnd_Category_News_Add');
        Route::post('/saveAddForm', 'Admin\CategoryNewController@saveAdd')->name('route_BackEnd_Category_News_saveAdd');
        Route::get('/detail/{id}', 'Admin\CategoryNewController@editForm')->name('route_BackEnd_Category_News_Detail');
        Route::post('/detail/{id}', 'Admin\CategoryNewController@saveEdit')->name('route_BackEnd_Category_News_Update');
    });

    Route::prefix('/vouchers')->group(function () {
        Route::get('/', 'Admin\VoucherController@index')->name('route_BackEnd_Voucher_index');
        Route::get('/add', 'Admin\VoucherController@add')->name('route_BackEnd_Voucher_add');
        Route::post('/add', 'Admin\VoucherController@store')->name('route_BackEnd_Voucher_store');

        Route::get('/edit', function () {
            return view('admin/vouchers/edit');
        });
        Route::post('/update', function () {
            return view('admin/vouchers/update');
        });

        Route::post('/check', 'Admin\VoucherController@check_voucher')->name('route_BackEnd_Voucher_check');
        Route::get('/unset', 'Admin\VoucherController@unset')->name('route_BackEnd_Voucher_unset');
    });
});
