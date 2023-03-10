<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $data = $request->all();
        $email = $data['email'];
        $password = $data['password'];
        // $arr = [
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ];

        // $email = $request->email;
        // $password = $request->password;

        // $email = $request->input('email');
        // $password = $request->input('password');
        // attempt sẽ có key là tên cột trong DB, value sẽ lấy từ form
        if (Auth::guard('admin')->attempt(['email' => $email ,'password' => $password])) {
            // Nếu khớp thông tin thì sẽ đăng nhập thành công, lưu thông tin vào session
            // Điều hướng quay về quản trị
            return redirect()->route('route_BackEnd_Dashboard');
        }
        // Nếu không thì quay ngược về login
        return redirect()->route('auth.getLogin');
    }

    public function getLoginGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginGoogleCallback()
    {
        $googleAdmin = Socialite::driver('google')->admin();
        if ($googleAdmin) {
            // 1. Xem xem admin này đã tồn tại trong DB chưa
            $admin = Admin::where('email', $googleAdmin->email)->first();
            // 2. Nếu tồn tại rồi thì cho đăng nhập
            if ($admin) {
                Auth::login($admin); // không cần check password vẫn cho đăng nhập vào
                return redirect()->route('route_BackEnd_Dashboard');
            }
            // 3. Nếu không có $admin thì tạo 1 bản ghi mới từ thông tin google
            $newAdmin = new Admin();
            $newAdmin->fill($googleAdmin->admin);
            $newAdmin->new_id = News::first()->id;
            $newAdmin->phone = '';
        // 'password',

        // 'username',
        // 'birthday',
        // 'phone',
        // 'role',
        // 'status',
        // 'room_id',
        // 'avatar'
        }
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('auth.getLogin');
    }

}
