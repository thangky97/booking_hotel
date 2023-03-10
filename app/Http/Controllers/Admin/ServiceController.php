<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function index() {
        $this->v['title'] = '12 Zodiac - Admin';

        return view("admin.banner", $this->v);
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
