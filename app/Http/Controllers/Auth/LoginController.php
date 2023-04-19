<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use App\Models\News;
use App\Models\User;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
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
        $method_route = 'getLogin';
        $data = $request->all();
        $email = $data['email'];
        $password = $data['password'];


        if (Auth::attempt(['email' => $email ,'password' => $password])) {

            return redirect()->route('route_BackEnd_Dashboard');
        }else {
            Session::flash('error', 'Sai tài khoản hoặc mật khẩu');
            return redirect()->route($method_route);
        }

        return redirect()->route('getLogin');
    }

    public function getLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('getLogin');
    }
}
