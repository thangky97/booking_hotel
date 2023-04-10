<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

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

                    );
                    Session::put('user_profile', $profile);
                } else {
                    $profile[] = array(
                        'id' => $user_profile->id,
                        'name' => $user_profile->name,
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
}
