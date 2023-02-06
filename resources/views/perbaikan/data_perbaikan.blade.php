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
                        <th>Action</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    
                </tbody> --}}
            </table>
        </div>
    </div>
</div>
@endsection