<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SigninController extends Controller
{
    public function getSignin()
    {
        return view('templates.pages.auth.sign_in');
    }

    public function postSignin(LoginRequest $request)
    {
        // $data = $request->all();
        // $email = $data['email'];
        // $password = $data['password'];
        // $arr = [
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ];

        // $email = $request->email;
        // $password = $request->password;

        $email = $request->input('email');
        $password = $request->input('password');
        // attempt sẽ có key là tên cột trong DB, value sẽ lấy từ form
        if ( ['email' === $email,'password' === $password]) {
            // Nếu khớp thông tin thì sẽ đăng nhập thành công, lưu thông tin vào session
            // Điều hướng quay về quản trị
            //dd("thành công");
            dd($email, " _ ", $password);
            //return redirect()->route('route_BackEnd_Dashboard');
        }
        // Nếu không thì quay ngược về login
        //dd('fail');
        return redirect()->route('getSignin');
    }


    // public function getLoginGoogle()
    // {
    //     return Socialite::driver('google')->redirect();
    // }

    // public function loginGoogleCallback()
    // {
    //     $googleAdmin = Socialite::driver('google')->admin();
    //     if ($googleAdmin) {
    //         // 1. Xem xem admin này đã tồn tại trong DB chưa
    //         $admin = Admin::where('email', $googleAdmin->email)->first();
    //         // 2. Nếu tồn tại rồi thì cho đăng nhập
    //         if ($admin) {
    //             Auth::login($admin); // không cần check password vẫn cho đăng nhập vào
    //             return redirect()->route('route_BackEnd_Dashboard');
    //         }
    //         // 3. Nếu không có $admin thì tạo 1 bản ghi mới từ thông tin google
    //         $newAdmin = new Admin();
    //         $newAdmin->fill($googleAdmin->admin);
    //         $newAdmin->new_id = News::first()->id;
    //         $newAdmin->phone = '';
    //     // 'password',

    //     // 'username',
    //     // 'birthday',
    //     // 'phone',
    //     // 'role',
    //     // 'status',
    //     // 'room_id',
    //     // 'avatar'
    //     }
    // }

    public function getLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('getLogin');
    }


    // public function postRegister(RegisterRequest $request)
    // {  
    //     $User = new User(); 
    //     $User->fill($request->all());  
    //     // DB::table('users')->insert([
    //         $User->password = Hash::make($request->password);
    //     // ]);

    //     if($request->hasFile('avatar')) { 
    //         $avatar = $request->avatar;
    //         $avatarName = $avatar->hashName();
    //         $avatarName = $request->productname . '_' . $avatarName; 
    //         $User->avatar = $avatar->storeAs('images/users', $avatarName); 
    //     } else {
    //         $User->avatar = '';
    //     } 
    //     $User->save();  

    //     return redirect()->route('auth.getLogin');  
    // }


    // public function getLoginGoogle(){
    //     return Socialite::driver('google')->redirect(); 
        
    // }
    // public function LoginGoogle(){
    //     $googleUser = Socialite::driver('google')->user(); 
    //     // dd($googleUser);
    //     if($googleUser){
    //         // 1. xem xem user này đã tồn tại trong DB chưa
    //         $user = User::where('email', $googleUser->email)->first();
           
    //         // 2. nếu tồn tại user rồi thì cho đăng nhập
    //         if($user){
    //             Auth::login($user); //Không cần check password vẫn cho đăng nhập vào và lưu thông tin
    //             return redirect()->route('client.client');
    //         }
    //         // 3. nếu không có user thì tạo 1 bản ghi mới từ thông tin google
    //         $newUser = new User();
    //         $newUser->fill($googleUser->user);
    //         $newUser->name = $googleUser->name; 
    //         $newUser->username = $googleUser->email; 
    //         $newUser->room_id = 0; 
    //         $newUser->email = $googleUser->email;
    //         $newUser->password = $googleUser->sub;
    //         $newUser->birthday = '';
    //         $newUser->role = 0;
    //         $newUser->status = 0;
    //         $newUser->phone = '';
    //         $newUser->avatar =  $googleUser->picture;  

    //         $newUser->save(); 
    //         return redirect()->back();
    //     }
    // }
}
