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
        if (Auth::attempt(['email' => $email ,'password' => $password])) {
            // Nếu khớp thông tin thì sẽ đăng nhập thành công, lưu thông tin vào session
            // Điều hướng quay về quản trị
            //dd("thành công");
            return redirect()->route('route_BackEnd_Dashboard');
        }
        // Nếu không thì quay ngược về login
        //dd('fail');
        return redirect()->route('getLogin');
    }

    public function getLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('getLogin');
    }


    public function getLoginGoogle(){

        return Socialite::driver('google')->stateless()->redirect();
        
    }
    public function loginGoogleCallback(){

        $googleUser = Socialite::driver('google')->stateless()->user(); 
        //dd($googleUser);
        if($googleUser){
            // 1. xem xem user này đã tồn tại trong DB chưa
            $user = Admin::where('email', $googleUser->email)->first();
           
            // 2. nếu tồn tại user rồi thì cho đăng nhập
            if($user){
                Auth::login($user); //Không cần check password vẫn cho đăng nhập vào và lưu thông tin
                return redirect()->route('route_FrontEnd_Home');
            }
            // 3. nếu không có admin thì tạo 1 bản ghi mới từ thông tin google
            $newUser = new Admin();
            $newUser->fill($googleUser->user);
            $newUser->name = $googleUser->name; 
            // $newUser->new_id = News::first()->google_id;
            $newUser->email = $googleUser->email;
            $newUser->password = Hash::make('123456');
            $newUser->role = 1;
            $newUser->status = 1;
            $newUser->phone = 'phone'; 
            $newUser->avatar =  'avatar';  

            $newUser->save(); 
            return redirect()->route('getSignin');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('getSignin');
    }

    
}
