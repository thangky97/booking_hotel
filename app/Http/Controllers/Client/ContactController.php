<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    private $v;

    public function __construct()
    {
        $this->v = [];
    }
    public function index() {
        return view('templates.pages.contact');
    }
    public function list(){

        $this->v['contact'] = DB::table('contact')->orderBy('name','desc')->paginate(10);
        $this ->v['title'] = 'Danh sách liên hệ';
        return view('admin.contact.index', $this->v);
    }
    public function add(Request $request){
        $rules = [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'content' => 'required',
                'title' => 'required'
        ];

        $messages =[
            'name.required' => 'Không được bỏ trống tên!',
            'email.required' => 'Không được bỏ trống email!',
            'phone.required' => 'Không được bỏ trống phone!',
            'content.required' => 'Không được bỏ trống nội dung!',
            'title.required' => 'Không được bỏ trống tiêu đề!',
        ];
        $validatedData = $request->validate($rules,$messages);

            $data = new Contact([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'content' => $request->content,
                    'title' => $request->title,
                    'status' => 0
                ]
            ) ;
            $data->save();

            return redirect()->route('route_FrontEnd_Contact')
                ->with('success', 'Gửi thành công! Chúng tôi sẽ phản hồi sớm nhất');
    }
    public function detail($id){
        $this ->v['title'] = 'Chi tiết liên hệ';
        $this ->v['contact']  = Contact::where('id', $id)->first();
        if ($this ->v['contact']['status'] === 0){
            Contact::where('id', $id)->update(['status'=>1]);
        }


        return view('admin.contact.edit', $this->v);

    }

}
