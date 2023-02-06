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
    <a href="{{url('/kategori/form')}}" class="btn btn-primary h-24 mb-3">
        <i class="fas fa-plus"> Tambah Data</i>
    </a>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $item)
                            <tr>
                                <td>{{$item["kd_kat"]}}</td>
                                <td>{{$item["nm_kat"]}}</td>
                                <td>
                                    <a href="{{ url('kategori/form/'.$item["id_kat"]) }}" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="{{ url('kategori/delete/'.$item["id_kat"]) }}" class="btn btn-danger btn-flat btn-sm" onclick="return confirmDelete(this)"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection