<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.feedback.index');
    }

    public function delete() {}

    public function add()
    {
        //thêm
        return view('admin.feedback.add');
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
