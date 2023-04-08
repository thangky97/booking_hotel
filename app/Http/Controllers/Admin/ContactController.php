<?php

namespace App\Http\Controllers\Admin;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ContactController extends Controller
{

    private $v;

    public function __construct()
    {
        $this->v = [];
    }
    public function index()
    {
        $this->v['contact'] = DB::table('contact')->orderBy('name','asc')->paginate(10);//phan trang , toi da 5 ban ghi
        $this ->v['title'] = 'Danh sách liên hệ';
        return view('admin.contact.index', $this->v);

    }

    // public function addForm()
    // {
    //     $this->v['title']= 'Thêm liên hệ';
    //     return view('admin.contact.add', $this->v);
    // }

    // public function saveAdd(Request $request)
    // {
    //     //khoi tao doi tuong
    //     $saveContact = new Contact();
    //     $saveContact->name = $request->name;
    //     $saveContact->phone = $request->phone;
    //     $saveContact->email = $request->email;
    //     $saveContact->content = $request->content;
    //     $saveContact->title = $request->title;
    //     $saveContact->status = $request->status;

    //     // luu

    //     $saveContact->save();
    //     return redirect()->route('route_BackEnd_Contact_List')
    //         ->with('success', 'Thêm thành công');
    // }

        public function editForm($id)
        {   
            $title='Sửa liên hệ';
            $editContact = Contact::find($id);
            return view('admin.contact.edit',compact('editContact','id','title'));
        }

        public function saveEdit(Request $request, $id){
            $createEdit = Contact::find($id);
            // $createEdit->name = $request->name;
            // $createEdit->phone = $request->phone;
            // $createEdit->email = $request->email;
            // $createEdit->content = $request->content;
            // $createEdit->title = $request->title;
            $createEdit->status = $request->status;

            $createEdit->save();
            return redirect()->route('route_BackEnd_Contact_List')
            ->with('success', 'Cập nhật thành công!');
        }
}
