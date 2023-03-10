<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.bill.index');
    }

    public function delete() {}

    public function add()
    {
        //thêm
        return view('admin.bill.add');
    }

    public function store()
    {
        //lưu thêm
    }

    public function edit()
    {
        //sửa
    }

    public function update() 
    {
        //lưu sửa
    }
}
