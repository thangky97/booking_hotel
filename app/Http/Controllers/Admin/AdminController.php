<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function admin()
    {
        $this->v['title'] = ' Dashboard';

        $this->v['totals'] = DB::table('bookings')
            ->selectRaw('count(*) as total')
            ->selectRaw("count(case when status_booking = '2' then 1 end) as active") //đã sử dụng
            ->selectRaw("count(case when status_booking = '1' then 1 end) as noActive") //Phòng trống
            ->selectRaw("count(case when status_booking = '3' then 1 end) as maintenance") //bảo trì
            ->selectRaw("count(checkin_date) as checkin")
            ->selectRaw("count(checkout_date) as checkout")
            ->first();

        return view("admin/dashboard", $this->v);
    }

    public function index(Request $request)
    {
        $title = ' Danh sách admin';
        $name = $request->get('name');
        $phone = $request->get('phone');
        $email = $request->get('email');
        if ($name) {
            $admin = Admin::where('name', 'like', '%' . $name . '%')
                ->paginate(20);
        } elseif ($phone) {
            $admin = Admin::where('phone', 'like', '%' . $phone . '%')
                ->paginate(20);
        } elseif ($email) {
            $admin = Admin::where('email', 'like', '%' . $email . '%')
                ->paginate(20);
        } else {
            $admin = Admin::select('id', 'name', 'email', 'phone', 'password', 'avatar', 'status', 'role')
                ->orderBy('status', 'asc')
                ->paginate(5);
        }

        return view('admin.administration.index', ['admin_list' => $admin, 'name' => $name, 'phone' => $phone, 'email' => $email, 'title' => $title],$this->v);
    }

    public function add(Request $request)
    {
        $this->v['title'] = ' Thêm mới admin';
        $method_route = "route_BackEnd_Admin_Add";



        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|min:3|max:40',
                'email' => 'required|email|max:50|unique:admin',
                'password' => 'required|min:6',
                'phone' => 'required|numeric|min:10',
                'status' => 'required',
                'images' =>
                [
                    'required',
                    'image',
                    'mimes:jpeg,png,jpg',
                    'mimetypes:image/jpeg,image/png',
                    'max:2048',
                ],
                'role' => 'required',
                'status' => 'required',
            ], [
                'name.required' => 'Tên bắt buộc nhập!',
                'name.min' => 'Tên tối thiểu 3 ký tự!',
                'name.max' => 'Tên tối đa là 40 ký tự!',
                'email.required' => 'Email bắt buộc nhập!',
                'email.unique' => 'Email đã tồn tại!',
                'email.email' => 'Email không đúng định dạng!',
                'email.max' => 'Email tối đa 50 ký tự!',
                'password.required' => 'Mật khẩu bắt buộc nhập!',
                'password.min' => 'Mật khẩu tối thiểu 6 ký tự!',
                'phone.required' => 'Số điện thoại bắt buộc nhập!',
                'phone.numeric' => 'Số điện thoại phải là số!',
                'phone.min' => 'Số điện thoại tối thiểu 10 số!',
                'images.required' => 'Ảnh không được để trống!',
                'images.image' => 'Bắt buộc phải là ảnh!',
                'images.max' => 'Ảnh không được lớn hơn 2MB!',
                'role.required' => 'Người dùng bắt buộc phải có 1 quyền',
                'status.required' => 'Bạn chưa chọn trạng thái',
            ], []);
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);
            //   dd($params['cols']);
            if ($request->hasFile('images') && $request->file('images')->isValid()) {
                $params['cols']['avatar'] = $this->uploadFile($request->file('images'));
            }
            $modelTes = new Admin();
            $res = $modelTes->saveNew($params);
            if ($res == null) {
                return  redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success', 'Thêm mới thành công!');
                return redirect()->route('route_BackEnd_Admin_List');
            } else {
                Session::flash('error', 'Thêm mới không thành công!');
                return redirect()->route($method_route);
            }
        }
        return view('admin.administration.add', $this->v);
    }

    public function edit($id, Request $request)
    {
        $modelAdmin = new Admin();
        $admin = $modelAdmin->loadOne($id);
        $this->v['title'] = ' Sửa admin';
        $this->v['admin'] = $admin;
        return view('admin.administration.edit', $this->v);
    }

    public function update($id, AdminRequest $request)
    {

        $method_route = 'route_BackEnd_Admin_Edit';
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
            Session::flash('success','Cập nhật thành công!');
            return redirect()->route('route_BackEnd_Admin_List');
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
