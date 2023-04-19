<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SignupController extends Controller
{
    public function getSignup()
    {
        return view('templates.pages.auth.sign_up');
    }

    public function postSignup(RegisterRequest $request)
    {

        $method_route = "getSignup";

        if ($request->isMethod('post')) {
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);

            $user_profile = DB::table('users')
                ->where('email', '=', $request->email)
                ->first();
            $modelTes = new Users();
            if (empty($user_profile)) {

                $res = $modelTes->saveNew($params);
                if ($res == null) {
                    return  redirect()->route($method_route);
                } elseif ($res > 0) {
                    Session::flash('success', 'Đăng ký tài khoản thành công');
                    return redirect()->route('getSignin');
                }
            } else {
                Session::flash('error', 'Tài khoản đã tồn tại trên hệ thống');
                return redirect()->route($method_route);
            }
        }
        return view('getLogin');
    }

    // public function uploadFile($file) {
    //     $fileName = time().'_'.$file->getClientOriginalName();
    //     return $file->storeAs('register',$fileName,'public');
    // }
}
