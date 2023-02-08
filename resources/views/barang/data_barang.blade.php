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
    <a href="{{url('/barang/form')}}" class="btn btn-primary h-20 mb-3">
        <i class="fas fa-plus"> Tambah Data</i>
    </a>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="font-size: 13px !important">
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th width="15px">Kategori</th>
                            <th>Harga</th>
                            <th>Tanggal Pembelian</th>
                            <th>Tempat</th>
                            {{-- <th>Keterangan</th> --}}
                            <th>Keadaan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $item)
                        <tr style="font-size: 14px !important">
                            <td>{{$item->kd_barang}}</td>
                            <td>{{$item->nm_barang}}</td>
                            <td>{{$item->nm_kat}}</td>
                            <td>{{$item->harga}}</td>
                            <td>{{$item->tgl_pembelian}}</td>
                            <td>{{$item->tempat}}</td>
                            {{-- <td>{{$item->ket}}</td> --}}
                            <td style="text-align: left">
                                <?php
                                if($item->status==1){
                                ?>
                                    <span class="badge bg-success" style="text-align: left;font-size:12px;color:#fff !important">BAIK</span>
                                <?php } 
                                else { 
                                ?>
                                    <span class="badge bg-danger" style="text-align: left;font-size:12px;color:#fff !important">RUSAK</span>
                                <?php 
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="{{ url('barang/form/'.$item->id_barang) }}" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ url('barang/delete/'.$item->id_barang) }}" class="btn btn-danger btn-flat btn-sm" onclick="return confirmDelete(this)"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection