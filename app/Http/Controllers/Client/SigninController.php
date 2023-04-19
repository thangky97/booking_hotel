<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Nette\Utils\Random;

class SigninController extends Controller
{
    private $v;

    public function __construct()
    {
        $this->v = [];
    }
    public function getSignin()
    {
        return view('templates.pages.auth.sign_in');
    }

    public function postSignin(LoginRequest $request)
    {
        $data = $request->all();
        $email = $data['email'];
        $password = $data['password'];

        $user_profile = DB::table('users')
            ->where('email', '=', $email)
            ->first();
        if (Hash::check($password, $user_profile->password)) {
            if ($user_profile) {
                $user_profile_session = Session::get('user_profile');

                if ($user_profile_session === true) {

                    $profile[] = array(
                        'id' => $user_profile->id,
                        'name' => $user_profile->name,
                        'phone' => $user_profile->phone,
                        'email' => $user_profile->email,
                        'address' => $user_profile->address,
                        'gender' => $user_profile->gender,
                        'date' => $user_profile->date,
                        'cccd' => $user_profile->cccd,
                    );
                    Session::put('user_profile', $profile);
                } else {
                    $profile[] = array(
                        'id' => $user_profile->id,
                        'name' => $user_profile->name,
                        'phone' => $user_profile->phone,
                        'email' => $user_profile->email,
                        'address' => $user_profile->address,
                        'gender' => $user_profile->gender,
                        'date' => $user_profile->date,
                        'cccd' => $user_profile->cccd,
                    );
                    Session::put('user_profile', $profile);
                }
                Session::save();
            }

            return redirect()->route('route_FrontEnd_Home');
        }

        return redirect()->route('getSignin');
    }


    public function getLoginGoogle()
    {

        return Socialite::driver('google')->stateless()->redirect();
    }
    public function loginGoogleCallback()
    {

        $googleUser = Socialite::driver('google')->stateless()->user();

        if ($googleUser) {

            $user = Admin::where('email', $googleUser->email)->first();

            if ($user) {
                Auth::login($user);
                return redirect()->route('route_FrontEnd_Home');
            }

            $newUser = new Admin();
            $newUser->fill($googleUser->user);
            $newUser->name = $googleUser->name;
            $newUser->avatar = $googleUser->avatar;
            $newUser->email = $googleUser->email;
            $newUser->password = Hash::make('123456');
            $newUser->role = 0;
            $newUser->status = 1;
            $newUser->phone = 'phone';

            $newUser->save();
            return redirect()->route('getSignin');
        }
    }


    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect()->route('route_FrontEnd_Home');
    }



    public function forgetPassword()
    {
        return view('templates.pages.auth.forget_password');
    }

    public function postforgetPassword(ForgetPasswordRequest $request)
    {
        // $token = random_bytes(10);
        $method_route = "forgetPassword";
        $user_profile = DB::table('users')
            ->where('email', '=', $request->email)
            ->first();
        $this->v['email'] = $request->email;
        $this->v['user_profile'] = $user_profile;
        // $this->v['token'] = bin2hex($token);

        if (isset($this->v['user_profile'])) {
            Mail::send('email.forgetPassword', $this->v, function ($email) {
                $email->subject('Đặt Lại Mật Khẩu Cho Tài Khoản Của Bạn');
                $email->to($this->v['email'], '12 Zodiac - Hotel');
            });

            Session::flash('success', 'Vui lòng kiểm tra email để đặt lại mật khẩu!');
            return redirect()->route($method_route);
        } else {
            Session::flash('error', 'Email không tồn tại trên hệ thống!');
            return redirect()->route($method_route);
        }
    }
    public function getPassword($id)
    {
        $user_profile = DB::table('users')
            ->where('id', '=', $id)
            ->first();
        $this->v['user_profile'] = $user_profile;
        if (isset($this->v['user_profile'])) {
            return view('templates.pages.auth.get_password', $this->v);
        }
        return view('error.404');
    }

    public function postPassword(Request $request)
    {
        $method_route = "getSignin";     
        $user = Users::findOrFail($request->id);

        $res = $user->fill([
            'password' => Hash::make($request->new_password)
        ])->save();
        if ($res == null) {
            return redirect()->route($method_route);
        } elseif ($res == 1) {
            Session::flash('success', 'Đặt lại mật khẩu thành công!');
            return redirect()->route($method_route);
        } else {
            Session::flash('error', 'Đặt lại mật khẩu thất bại!');
            return redirect()->route($method_route);
        }

        return view('error.404');
    }
}
