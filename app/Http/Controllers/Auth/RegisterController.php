<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request) {
        $method_route = "getRegister";
        if ($request->isMethod('post')) {
            $params = [];
            $params['cols'] = $request->post();
            unset( $params['cols']['_token']);
         //   dd($params['cols']);
            if ($request->hasFile('images') && $request->file('images')->isValid())
            {
                $params['cols']['avatar'] = $this->uploadFile($request->file('images'));
            }
            $modelTes = new Admin();
            $res = $modelTes->saveNew($params);
            if ($res == null) {
                return  redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success','Đăng ký');
                return redirect()->route('getLogin');
            } else {
                Session::flash('error','Lỗi đăng ký tài khoản ');
                return redirect()->route($method_route);
            }
        }
        return view('getLogin');
    }

    public function uploadFile($file) {
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('register',$fileName,'public');
    }
}
