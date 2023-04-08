<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function edit($id, Request $request)
    {
        $modelUser = new Admin();
        $user = $modelUser->loadOne($id);
        $this->v['title'] = 'Sửa hồ sơ';
        $this->v['user'] = $user;
        return view('admin.profile.index', $this->v);
    }

    public function update($id, ProfileRequest $request)
    {

        $method_route = 'route_BackEnd_Profile_Edit';
        $params = [];

        $params['cols'] = $request->post();

        if ($request->hasFile('images') && $request->file('images')->isValid()) {
            $params['cols']['avatar'] = $this->uploadFile($request->file('images'));
        }

        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;

        $modelAdmin = new Admin();
        $res = $modelAdmin->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route, ['id' => $id]);
        } elseif ($res == 1) {
            Session::flash('success', 'Cập nhậtt thành công!');
            return redirect()->route($method_route, ['id' => $id]);
        } else {
            Session::flash('error', 'Cập nhật không thành công!');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }

    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('admin', $fileName, 'public');
    }
}
