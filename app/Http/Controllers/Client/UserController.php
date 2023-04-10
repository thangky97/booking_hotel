<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfilePasswordRequest;
use App\Models\Bills;
use App\Models\CategoryRooms;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    private $v;

    public function __construct()
    {
        $this->v = [];
    }
    public function profile($id, Request $request)
    {
        $user = new Users();
        $this->v['user_pf'] = $user->loadOne($id);
        $Cate_rooms = new CategoryRooms();
        $this->v['listCaterooms'] = $Cate_rooms->loadAll();
        $history = DB::table('bookings')
            ->where('bookings.user_id', '=', $id)
            ->orderByDesc('bookings.id')
            ->get();
        $bill = new Bills();
        $this->v['bills'] = $bill->loadAll();
        $this->v['history'] = $history;
        $this->v['title'] = 'Hồ sơ cá nhân';
        return view('templates.pages.profile', $this->v);
    }
    public function update_profile($id, Request $request)
    {
        $method_route = "route_FrontEnd_User_Profile";
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $params['cols']['image'] = $this->uploadFile($request->file('image'));
        }
        if ($request->hasFile('cccd') && $request->file('cccd')->isValid()) {
            $params['cols']['cccd'] = $this->uploadFile($request->file('cccd'));
        }
        $profile = new Users();
        $params['cols']['id'] = $id;
        $res = $profile->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhật thông tin hồ sơ thành công !');
            return redirect()->route($method_route, ['id' => $id]);
        } else {
            Session::flash('error', 'Lỗi cập nhật thông tin hồ sơ !');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }
    public function update_password($id, ProfilePasswordRequest $request)
    {
        $method_route = "route_FrontEnd_User_Profile";
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);

        $user = Users::findOrFail($id);
        $params['cols']['id'] = $id;
        if (Hash::check($request->password, $user->password)) {
            $res = $user->fill([
                'password' => Hash::make($request->new_password)
            ])->save();
            if ($res == null) {
                return redirect()->route($method_route, ['id' => $id]);
            } elseif ($res == 1) {
                Session::flash('success', 'Cập nhật mật khẩu thành công !');
                return redirect()->route($method_route, ['id' => $id]);
            } else {
                Session::flash('error', 'Lỗi cập nhật mật khẩu');
                return redirect()->route($method_route, ['id' => $id]);
            }
        } else {
            Session::flash('error', 'Mật khẩu cũ không chính xác !');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }
    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('profile', $fileName, 'public');
    }
}
