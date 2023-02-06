@extends('layouts.template')

@section("judul",$judul)
@section("sub_judul",$sub_judul)

@section('content')
<script>
    $(function(){
        @if($errors->any())
        showMessage("Terjadi Kesalahan !","Data Gagal Disimpan","error","Oke");
        @endif
    });
  </script>
<form action="{{ url('kategori/save')}}" method="post">
    @csrf
    <div class="row mb-5">
        <div class="col-md-3">

        </div>
        <div class="dt_member col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="kd_kat">Kode Kategori</label>
                        <input type="hidden" name="id_kat" value="{{ @$dtKategori->id_kat }}">
                        <input type="text" class="form-control  @error("kd_kat") is-invalid  @enderror" id="kd_kat" name="kd_kat" placeholder="Kode Kategori" value="{{ old("kd_kat") ? old("kd_kat") : @$dtKategori->kd_kat }}">
                        @error("kd_kat")
                        <span id="error-kd_kat" class="error invalid-feedback">
                            {{ $errors->first("kd_kat") }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nm_kat">Nama Kategori</label>
                        <input type="text" class="form-control  @error("nm_kat") is-invalid  @enderror" id="nm_kat" name="nm_kat" placeholder="Nama Kategori" value="{{ old("nm_kat") ? old("nm_kat") : @$dtKategori->nm_kat }}">
                        @error("nm_kat")
                        <span id="error-nm_kat" class="error invalid-feedback">
                            {{ $errors->first("nm_kat") }}
                        </span>
                        @enderror
                    </div>
                    <div class="footer">
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary w-25">SIMPAN</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection