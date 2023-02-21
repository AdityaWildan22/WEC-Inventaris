<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Inv_Dashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $data = [
            "judul"=>"DASHBOARD",
            "sub_judul"=>"DASHBOARD"
        ];
        return view("dashboard",$data);
    }
}
