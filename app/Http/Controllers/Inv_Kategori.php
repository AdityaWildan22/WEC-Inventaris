<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Http\Request;

class Inv_Kategori extends Controller
{
    // function index/home kategori
    function index(){
        $data = [
            "judul"=>"Data Kategori",
            "sub_judul"=>"Data Kategori",
            "kategori"=>Kategori::All()
        ];
        return view("kategori.data_kategori",$data);
    }

    // function form kategori
    function form(Request $req){
        $mode = $req->id!= "" ? "Edit" : "Tambah";
        $data = [
            "judul"=>$mode." Kategori",
            "sub_judul"=>$mode." Kategori",
            "dtKategori"=>Kategori::where("id_kat",$req->id)->first() 
        ];
        return view("kategori.form_kategori",$data);
    }

    // function save kategori
    function save(Request $req){
        //validasi
        $req->validate(
            //rule
            [
                "kd_kat"=>"required|unique:inv_kategori,kd_kat,".$req->input("id_kat").",id_kat",
                "nm_kat"=>"required",
            ],
            [
                //message error
                "kd_kat.required"=>"Kode Kategori Harus Diisi",
                "kd_kat.unique"=>"Kode Kategori Sudah Digunakan",
                "nm_kat.required"=>"Nama Kategori Harus Diisi",
            ]
        );
        try{
            //proses save
            Kategori::UpdateorCreate(
                [
                    "id_kat"=>$req->input("id_kat")
                ],
                [
                    "kd_kat"=>$req->input("kd_kat"),
                    "nm_kat"=>$req->input("nm_kat")
                ]
            );
            //message success
            $mess=["type"=>"Data Kategori","text"=>"Berhasil Disimpan !!!","icon"=>"success","button"=>"OK"];
        }catch(Exception $err){
            //message error
            $mess=["type"=>"Data Kategori","text"=>"Gagal Disimpan !!!","icon"=>"error","button"=>"OK"];
        }
        //redirect
        return redirect('kategori')->with($mess);
    }

    //function delete kategori
    function delete(Request $req){
        //proses delete
        try{
            Kategori::where("id_kat",$req->id)->delete();
            //message success
            $mess=["type"=>"Data Kategori","text"=>"Berhasil Dihapus !!!","icon"=>"success","button"=>"OK"];
        }catch(Exception $err){
            //message error
            $mess=["type"=>"Data Kategori","text"=>"Gagal Disimpan !!!","icon"=>"error","button"=>"OK"];
        }
        //redirect
        return redirect('kategori')->with($mess);
    }
}