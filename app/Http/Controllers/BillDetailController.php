<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillDetailController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.bill_detail.index');
    }

    public function delete() {}

    public function add()
    {
        //thêm
        return view('admin.bill_detail.add');
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
