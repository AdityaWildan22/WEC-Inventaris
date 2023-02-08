@extends('layouts.template')

@section('judul',$judul)
    
@section('sub_judul',$sub_judul)

@section('content')
    <script>
        $(function(){
            @if(session("type"))
            showMessage('{{ session("type") }}','{{ session("text") }}','{{ session("icon") }}','{{ session("button") }}');
            @endif
        });
    </script>
    <!-- DataTales Example -->
    <a href="{{url('/user/form')}}" class="btn btn-primary h-24 mb-3">
        <i class="fas fa-plus"> Tambah Data</i>
    </a>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td>{{$item["username"]}}</td>
                                <td>{{$item["role"]}}</td>
                                <td style="text-align: left">
                                    <?php
                                    if($item->status==1){
                                    ?>
                                        <span class="badge bg-success" style="text-align: left;font-size:12px;color:#fff !important">AKTIF</span>
                                    <?php } 
                                    else { 
                                    ?>
                                        <span class="badge bg-danger" style="text-align: left;font-size:12px;color:#fff !important">NON AKTIF</span>
                                    <?php 
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href="{{ url('user/form/'.$item["id"]) }}" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="{{ url('user/delete/'.$item["id"]) }}" class="btn btn-danger btn-flat btn-sm" onclick="return confirmDelete(this)"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection