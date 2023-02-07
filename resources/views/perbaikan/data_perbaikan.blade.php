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
  <a href="{{url('/perbaikan/form')}}" class="btn btn-primary h-20 mb-3">
    <i class="fas fa-plus"> Tambah Data</i>
</a>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Tanggal Perbaikan</th>
                        <th>Kerusakan</th>
                        <th>Solusi</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($perbaikan as $item)
                        <tr>
                            <td>{{$item->kd_barang}}</td>
                            <td>{{$item->nm_barang}}</td>
                            <td>{{$item->tgl_perbaikan}}</td>
                            <td>{{$item->kerusakan}}</td>
                            <td>{{$item->solusi}}</td>
                            <td style="text-align: center">
                                <?php
                                if($item->status==1){
                                ?>
                                    <span class="badge bg-success" style="text-align: center;font-size:10px;color:#fff !important">SELESAI</span>
                                <?php } 
                                else { 
                                ?>
                                    <span class="badge bg-danger" style="text-align: center;font-size:10px;color:#fff !important">PENDING</span>
                                <?php 
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="{{ url('perbaikan/form/'.$item->id_perbaikan) }}" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ url('perbaikan/delete/'.$item->id_perbaikan) }}" class="btn btn-danger btn-flat btn-sm" onclick="return confirmDelete(this)"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection