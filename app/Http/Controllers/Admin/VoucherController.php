<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\CategoryRooms;
use App\Models\Voucher;
use App\Models\Vouchers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

session_start();
class VoucherController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function index()
    {
        $this->v['now'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');


        $this->v['voucher'] = Voucher::where('status', 1)
            ->orderBy('id', 'asc')

            ->paginate(10);
        $this->v['title'] = 'Danh sách vouchers';

        return view('admin.voucher.index',$this->v);
    }

    public function delete() {}

    public function add()
    {
        //thêm
        $this->v['title'] = ' Thêm Voucher';
        return view('admin.voucher.add',$this->v);
    }

    public function store(Request $request)
    {
        $voucher =new Voucher([
            "name" =>$request->name,
            "code" =>$request->code,
            "limit" =>$request->limit,
            "discount" =>$request->discount,
            "status" =>$request->status,
            "date_start" =>$request->date_start,
            "date_end" =>$request->date_end,
        ]);
        $voucher->save();

        return redirect()->route('route_BackEnd_Voucher_index')
            ->with('success', 'Thêm thành công');
    }

    public function edit($id)
    {
        $this->v['id'] = $id;
        $this->v['voucher'] = Voucher::find($id);

        $this->v['title'] = ' Sửa Voucher';
        return view('admin.voucher.edit', $this->v);
    }

    public function update(Request $request, $id)
    {
        $voucher = Voucher::find($id);
        $voucher->update([
            "name" => $request->name,
            "code" => $request->code,
            "discount" => $request->discount,
            "limit" => $request->limit,
            "date_start" => $request->date_start,
            "date_end" => $request->date_end,
            "status" => $request->status
        ]);

        return redirect()->route('route_BackEnd_Voucher_index')
            ->with('success', 'Sửa thành công!');

    }
    public  function check_voucher(Request $request){
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $data = $request->all();

        $voucher = Voucher::where('code', $data['voucher'])
            ->where('date_end','>=', $now)
            ->where('status',1)
            ->first();
        if ($voucher){
            $voucher_count = $voucher->count();
            if ($voucher_count>0){
                $voucher_session = Session::get('voucher');

                if($voucher_session === true){
                    $is_avaiable = 0;
                    if ($is_avaiable == 0){
                        $vou[] = array(
                            'id'=>$voucher->id,
                            'code' =>  $voucher->code,
                            'limit' =>  $voucher->limit,
                            'discount' =>  $voucher->discount,
                        );
                        Session::put('voucher', $vou );

                    }
                }else{
                    $vou[] = array(
                        'id'=>$voucher->id,
                        'code' =>  $voucher->code,
                        'limit' =>  $voucher->limit,
                        'discount' =>  $voucher->discount,
                    );
                    Session::put('voucher', $vou );
                }

                Session::save();

                return redirect()->back()
                    ->with('success', 'Sử dụng mã voucher thành công');
            }
        }else{
            return redirect()->back()
                ->with('error', 'Mã voucher không đúng hoặc đã hết hạn');
        }
    }
    public function unset()
    {
        $voucher = Session::get('voucher');
        if($voucher == true){
            Session::forget('voucher');
            return redirect()->back()
                ->with('success', 'Xóa voucher thành công');
        }
    }
}
