<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CategoryRooms;
use App\Models\Rooms;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->get('name');
        $categories = CategoryRooms::select('id', 'name', 'price', 'status')->where('status', '=', 1)->get(); 
        // if($name){
        //     return view('home', 
        //         [    
        //             'name' => $name,  
        //         ]); 
        // }else{ 
        //     $rooms = Rooms::select('id', 'name', 'price', 'thumbnail_url', 'status', 'room_id')
        //     ->where('status', '=', 1)
        //     ->paginate(8); 
        //     return view('home', 
        //         [   'categories' => $categories,
        //             'name' => $name,
        //             'rooms' => $rooms 
        //         ]);
        // } 
        return view('home', 
                [    
                    'categories' => $categories,  
                ]); 
        
    }
}
