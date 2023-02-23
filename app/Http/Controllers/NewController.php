<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.new.index');
    }

    public function delete() {}

    public function add()
    {
        //thêm
        return view('admin.new.add');
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
