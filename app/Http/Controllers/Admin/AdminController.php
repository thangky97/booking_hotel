<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
                ->with('new')
                ->paginate(5);
        }

        return view('admin.administration.index', ['admin_list' => $admin, 'name' => $name, 'phone' => $phone, 'email' => $email, 'title' => $title]);
    }

    public function add(Request $request)
    {
        $this->v['title'] = ' Thêm mới admin';
        $method_route = "route_BackEnd_Admin_Add";

        if ($request->isMethod('post')) {
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
                Session::flash('success', 'Thêm mới thành công Admin');
                return redirect()->route('route_BackEnd_Admin_List');
            } else {
                Session::flash('error', 'Lỗi thêm mới user ');
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

    public function update($id, Request $request)
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
            //Session::flash('success','Cập nhât bản ghi' . $id . " ".  "Thành công");
            return redirect()->route('route_BackEnd_Admin_List')->with('sucess', 'Cập nhật admin thành công');
        } else {
            Session::flash('error', 'Lỗi cập nhât bản ghi' . $id);
            return redirect()->route($method_route, ['id' => $id]);
        }
    }


    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('admin', $fileName, 'public');
    }
    
}
