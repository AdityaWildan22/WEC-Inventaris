<?php

namespace App\Http\Controllers;
use App\Models\Perbaikan;
use Illuminate\Http\Request;

class Inv_Perbaikan extends Controller
{
    //function index/home
    function index(){
        $data=[
            "judul"=>"Data Perbaikan",
            "sub_judul"=>"Data Perbaikan",
            "perbaikan"=>Perbaikan::All()
        ];
        return view("perbaikan.data_perbaikan",$data);
    }

    //function form data perbaikan
    function form(Request $req){
        $mode = $req->id!= "" ? "Edit" : "Tambah";
        $data = [
            "judul"=>$mode."Perbaikan",
            "sub_judul"=>$mode."Perbaikan",
            "dtPerbaikan"=>Perbaikan::where("id_perbaikan",$req->id)->first()
        ];
        return view("perbaikan.form_perbaikan",$data);
    }
}
