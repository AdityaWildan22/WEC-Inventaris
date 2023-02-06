<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Inv_Dashboard extends Controller
{
    //
    function index(){
        $data = [
            "judul"=>"Dashboard",
            "sub_judul"=>"Dashboard"
        ];
        return view("dashboard",$data);
    }
}
