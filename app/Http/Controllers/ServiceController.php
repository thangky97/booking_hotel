<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.service.index');
    }

    public function delete() {}

    public function add()
    {
        //thêm
        return view('admin.service.add');
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
