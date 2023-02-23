<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.administration.index');
    }

    public function delete() {}

    public function add()
    {
        //thêm
        return view('admin.administration.add');
    }

    public function store()
    {
        //lưu thêm
    }

    public function edit( $user)
    {
        //sửa
    }

    public function update() 
    {
        //lưu sửa
    }
}
