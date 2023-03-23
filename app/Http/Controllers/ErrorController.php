<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{

    public function error403() {
        return view('error.403');
    }

    public function error404() {
        return view('error.404');
    }

    public function error500() {
        return view('error.500');
    }

    public function error503() {
        return view('error.503');
    }
}
