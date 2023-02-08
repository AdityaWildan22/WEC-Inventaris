<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Inv_Barang extends Controller
{
    //function index/data barang
    function index(){
        $barang = DB::table("inv_barang")
        ->join("inv_kategori","inv_barang.id_kat","=","inv_kategori.id_kat")
        ->select("inv_barang.*","inv_kategori.nm_kat")
        ->get();
        $data=[
            "judul"=>"Data Barang",
            "sub_judul"=>"Data Barang",
            // "barang"=>Barang::All()
            "barang"=>$barang
        ]; 
        return view("barang.data_barang",$data);
    }

    //function form 
    function form(Request $req){
        $barang = DB::table("inv_barang")
        ->join("inv_kategori","inv_barang.id_kat","=","inv_kategori.id_kat")
        ->select("inv_barang.*","inv_kategori.nm_kat")
        ->get();
        $mode = $req->id!= "" ? "Edit" : "Tambah";
        $data=[
            "judul"=>$mode." Barang",
            "sub_judul"=>$mode." Barang",
            "dtBarang"=>$barang->where("id_barang",$req->id)->first(),
            "kategori"=>Kategori::All()
        ];
        return view("barang.form_barang",$data);
    }

    //function save
    function save(Request $req){
        //dd($req->all());
        //validasi 
        $req->validate(
            [
                "kd_barang"=>"required|unique:inv_barang,kd_barang,".$req->input("id_barang").",id_barang",
                "nm_barang"=>"required",
                "harga"=>"required",
                "tgl_pembelian"=>"required",
                "tempat"=>"required",
                "status"=>"required"
            ],
            //message error
            [
                "kd_barang.required"=>"Kode Barang Harus Diisi",
                "kd_barang.unique"=>"Kode Barang Sudah Digunakan",
                "nm_barang.required"=>"Nama Barang Harus Diisi",
                "harga.required"=>"Harga Harus Diisi",
                "tgl_pembelian.required"=>"Tanggal Pembelian Harus Diisi",
                "tempat.required"=>"Tempat Harus Diisi",
                "status.required"=>"Status Harus Diisi"
            ]
        );
        try{
            //saving process
            Barang::UpdateorCreate(
                [
                    "id_barang"=>$req->input("id_barang")
                ],
                [
                    "id_kat"=>$req->input("id_kat"),
                    "kd_barang"=>$req->input("kd_barang"),
                    "nm_barang"=>$req->input("nm_barang"),
                    "harga"=>$req->input("harga"),
                    "tgl_pembelian"=>$req->input("tgl_pembelian"),
                    "tempat"=>$req->input("tempat"),
                    "ket"=>$req->input("ket"),
                    "status"=>$req->input("status")
                ]
                
            );
            //message success
            $mess=["type"=>"Data Barang {$req['kd_barang']}","text"=>"Berhasil Disimpan","icon"=>"success","button"=>"Oke"];
        }catch(Exception $err){
            //message error
            $mess=["type"=>"Data Barang {$req['kd_barang']}","text"=>"Gagal Disimpan","icon"=>"error","button"=>"Oke"];
        }
       //redirect
       return redirect('barang')->with($mess);
    }

    //function delete
    function delete(Request $req){
        //proses delete
        try{
            Barang::where("id_barang",$req->id)->delete();
            //message success
            $mess=["type"=>"Data Barang {$req['kd_barang']}","text"=>"Berhasil Dihapus !!!","icon"=>"success","button"=>"OK"];
        }catch(Exception $err){
            //message error
            $mess=["type"=>"Data Barang {$req['kd_barang']}","text"=>"Gagal Disimpan !!!","icon"=>"error","button"=>"OK"];
        }
        //redirect
        return redirect('barang')->with($mess);
    }
}
