<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request) {
        $title = '12Zodiac - Dịch vụ';
        $services = Service::select('name', 'images', 'status')
        ->where('status', '=', 1)
        ->get();
        return view('templates.pages.service', compact('services', 'title'));
    }
}
