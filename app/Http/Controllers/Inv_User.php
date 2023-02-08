<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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

    //function save user
    function save(Request $req){
        //dd($req->all());
        //validasi
        $req->validate(
            [
                //rules
                "username"=>"required",
                "role"=>"required",
                "status"=>"required",
            ],
            [
                //message error
                "username.required"=>"Username Harus Diisi",
                "role.required"=>"Role Harus Diisi",
                "status.required"=>"Status Harus Diisi",
            ]
        );

        try{
            //proses save
            User::UpdateorCreate(
                [
                    "id"=>$req->input("id")
                ],
                [
                    "username"=>$req->input("username"),
                    "password"=> $req->input("password") == "" ? $req->input("old_password") : Hash::make($req->input("password")),
                    "role"=>$req->input("role"),
                    "status"=>$req->input("status")
                ]
            );
            //message if success
            $mess=["type"=>"Data User {$req['username']}","text"=>"Berhasil Disimpan !!!","icon"=>"success","button"=>"OK"];
        }catch(Exception $err){
            //message if error
            $mess=["type"=>"Data User {$req['username']}","text"=>"Gagal Disimpan !!!","icon"=>"error","button"=>"OK"];
        }

        //redirect
        return redirect('user')->with($mess);
    }

    //function delete user
    function delete(Request $req){
        //proses delete
        try{
            User::where("id",$req->id)->delete();
            //message success
            $mess=["type"=>"Data User {$req['username']}","text"=>"Berhasil Dihapus !!!","icon"=>"success","button"=>"OK"];
        }catch(Exception $err){
            //message error
            $mess=["type"=>"Data User {$req['username']}","text"=>"Gagal Dihapus !!!","icon"=>"error","button"=>"OK"];
        }

        //redirect
        return redirect('user')->with($mess);
    }
}


