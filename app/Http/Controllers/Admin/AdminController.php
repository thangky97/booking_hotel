<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
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
        // $jobs = new Employer();
        // $this->v['list'] = $jobs->loadListWithPager();    
        $this->v['title'] = '12 Zodiac - Dashboard';
        return view("admin/dashboard",$this->v);
    }

    public function index(Request $request)
    {
        $title = '12 Zodiac - Admin';
        $name = $request->get('name');
        if($name){
            $admin = Admin::where('name','like','%'.$name.'%')
        // ->where('id', '>', 3) 
        ->with('new') 
        ->paginate(5);
        }else{
            $admin = Admin::select('id', 'name', 'email', 'phone', 'password', 'avatar', 'status', 'role')
            // ->get();
        // ->where('id', '>', 3)
        // (tên trường, toán tử điều kiện, giá trị)
        ->with('new') // truy vấn thêm quan hệ trước khi truy vấn 
        // ->where('id', '<=', 7)
        ->paginate(5);
        // ->cursorPaginate(5); truy vấn where id > 5 limit 5
        // dd($users);
        }   

        return view('admin.administration.index', ['admin_list' => $admin, 'name' => $name, 'title' => $title]);
    }

    public function add(Request $request) {
        $this->v['title'] = 'Thêm mới admin';
        $method_route = "route_BackEnd_Admin_Add";

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
                Session::flash('success','Thêm mới thành công Admin');
                return redirect()->route('route_BackEnd_Admin_List');
            } else {
                Session::flash('error','Lỗi thêm mới user ');
                return redirect()->route($method_route);
            }
        }
        return view('admin.administration.add', $this->v);
    }

    public function edit($id, Request $request) {
        $modelAdmin = new Admin();
        $admin = $modelAdmin->loadOne($id);
        $this->v['title'] = 'Sửa admin';
        $this->v['admin'] = $admin;
        return view('admin.administration.edit', $this->v);
    }

    public function update($id, Request $request) {

        $method_route = 'route_BackEnd_Admin_Edit';
        $params = [];

        $params['cols'] = $request->post();

        if ($request->hasFile('images') && $request->file('images')->isValid())
            {
                $params['cols']['avatar'] = $this->uploadFile($request->file('images'));
            }

        unset( $params['cols']['_token']);
        $params['cols']['id'] = $id;

        $modelAdmin = new Admin();
        $res = $modelAdmin->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route,['id'=>$id]);
        } elseif ($res == 1) {
            //Session::flash('success','Cập nhât bản ghi' . $id . " ".  "Thành công");
            return redirect()->route('route_BackEnd_Admin_List')->with('sucess', 'Cập nhật admin thành công');
        } else {
            Session::flash('error','Lỗi cập nhât bản ghi'.$id);
            return redirect()->route($method_route,['id'=>$id]);
        }
    }

    public function uploadFile($file) {
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('admin',$fileName,'public');
    }

    // public function changeStatus(Request $request)

    // { 
    //     $User = User::find($request->id); 
    //     $User->status = $request->status; 
    //     $User->save(); 
    //     return response()->json(['success'=>'Status change successfully.']); 
    // }
}
