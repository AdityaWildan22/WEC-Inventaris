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
            "judul"=>$mode." Perbaikan",
            "sub_judul"=>$mode." Perbaikan",
            "dtPerbaikan"=>Perbaikan::where("id_perbaikan",$req->id)->first()
        ];
        return view("perbaikan.form_perbaikan",$data);
    }

    //function save data perbaikan
    function save(Request $req){
        dd($req->all());
        //validasi
        $req->validate(
             //rule
           [
                "kd_barang"=>"required",
                "tgl_perbaikan"=>"required",
                "kerusakan"=>"required",
                "solusi"=>"required",
                "status"=>"required",
           ],
           [
             //message error
                "kd_barang.required"=>"Kode Barang Harus Diisi",
                "tgl_perbaikan.required"=>"Tanggal Perbaikan Harus Diisi",
                "kerusakan.required"=>"Kerusakan Harus Diisi",
                "solusi.required"=>"Solusi Harus Diisi",
                "status.required"=>"Status Harus Diisi",
           ]

        );
        try{
            //proses save
            Perbaikan::UpdateorCreate(
                [
                    "id_perbaikan"=>$req->input("id_perbaikan")
                ],
                [
                    "kd_barang"=>$req->input("kd_barang"),
                    "tgl_perbaikan"=>$req->input("tgl_perbaikan"),
                    "kerusakan"=>$req->input("kerusakan"),
                    "solusi"=>$req->input("solusi"),
                    "status"=>$req->input("status")
                ]
            );
            //message success
            $mess=["type"=>"Data Perbaikan","text"=>"Berhasil Disimpan !!!","icon"=>"success","button"=>"OK"];
        }catch(Exception $err){
            $mess=["type"=>"Data Perbaikan","text"=>"Gagal Disimpan !!!","icon"=>"error","button"=>"OK"];
        }
        //redirect
        return redirect('perbaikan')->with($mess);
    }
}
