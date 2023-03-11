<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index(Request $request)
    {
        $title = '12 Zodiac - Danh sách user';
        $name = $request->get('name');
        if($name){
            $users = Users::where('name','like','%'.$name.'%')
        // ->where('id', '>', 3) 
        ->with('new') 
        ->paginate(5);
        }else{
            $users = Users::select('id', 'name', 'email', 'phone', 'address', 'cccd', 'date', 'gender', 'status')
            // ->get();
        // ->where('id', '>', 3)
        // (tên trường, toán tử điều kiện, giá trị)
        //->with('new') // truy vấn thêm quan hệ trước khi truy vấn 
        // ->where('id', '<=', 7)
        ->paginate(5);
        // ->cursorPaginate(5); truy vấn where id > 5 limit 5
        // dd($users);
        }   

        return view('admin.user.index', compact('users','name','title'));
    }

    public function add(Request $request) {
        $this->v['title'] = '12 Zodiac - Thêm mới user';
        $method_route = "route_BackEnd_Users_Add";

        if ($request->isMethod('post')) {
            $params = [];
            $params['cols'] = $request->post();
            unset( $params['cols']['_token']);

            $modelTes = new Users();
            $res = $modelTes->saveNew($params);
            if ($res == null) {
                return  redirect()->route($method_route);
            } elseif ($res > 0) {
                Session::flash('success','Thêm mới thành công User');
                return redirect()->route('route_BackEnd_Users_List');
            } else {
                Session::flash('error','Lỗi thêm mới User');
                return redirect()->route($method_route);
            }
        }
        return view('admin.user.add', $this->v);
    }

    public function edit($id, Request $request) {
        $modelUser = new Users();
        $users = $modelUser->loadOne($id);
        $this->v['title'] = '12 Zodiac - Sửa user';
        $this->v['users'] = $users;
        return view('admin.user.edit', $this->v);
    }

    public function update($id, Request $request) {

        $method_route = 'route_BackEnd_Users_Edit';
        $params = [];

        $params['cols'] = $request->post();

        unset( $params['cols']['_token']);
        $params['cols']['id'] = $id;

        $modelUser = new Users();
        $res = $modelUser->saveUpdate($params);
        if ($res == null) {
            return redirect()->route($method_route,['id'=>$id]);
        } elseif ($res == 1) {
            Session::flash('success','Cập nhât bản ghi' . $id . " ".  "Thành công");
            return redirect()->route('route_BackEnd_Users_List');
        } else {
            Session::flash('error','Lỗi cập nhât bản ghi'.$id);
            return redirect()->route($method_route,['id'=>$id]);
        }
    }


    // public function changeStatus(Request $request)

    // { 
    //     $User = User::find($request->id); 
    //     $User->status = $request->status; 
    //     $User->save(); 
    //     return response()->json(['success'=>'Status change successfully.']); 
    // }
}
