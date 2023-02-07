<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class Inv_User extends Controller
{
    //function index/home
    function index(){
        $data=[
            "judul"=>"Data User",
            "sub_judul"=>"Data User",
            "user"=>User::All()
        ];
        return view("user.data_user",$data);
    }

    //function form
    function form(Request $req){
        $mode=$req->id!= "" ? "Edit" : "Tambah";
        $data=[
            "judul"=>$mode." User",
            "sub_judul"=>$mode." User",
            "dtUser"=>User::where("id",$req->id)->first()
        ];
        return view("user.form_user",$data);
    }
}
