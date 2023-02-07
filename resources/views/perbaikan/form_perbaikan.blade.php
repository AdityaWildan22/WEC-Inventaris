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
<form action="{{ url('perbaikan/save')}}" method="post">
    @csrf
    <div class="row mb-5">
        <div class="col-md-2">

        </div>
        <div class="dt_perbaikan col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="kd_barang">Kode Barang</label>
                        <input type="hidden" name="id_perbaikan" value="{{ @$dtPerbaikan->id_perbaikan}}">
                        <input type="text" class="form-control  @error("kd_barang") is-invalid  @enderror" id="kd_barang" name="kd_barang" placeholder="Kode Barang" value="{{ old("kd_barang") ? old("kd_barang") : @$dtPerbaikan->kd_barang }}">
                        @error("kd_barang")
                        <span id="error-kd_barang" class="error invalid-feedback">
                            {{ $errors->first("kd_barang") }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tgl_perbaikan">Tanggal Perbaikan</label>
                        <input type="text" class="form-control @error("tgl_perbaikan") is-invalid  @enderror" id="tgl_perbaikan" name="tgl_perbaikan" placeholder="Tanggal perbaikan" value="{{  old("tgl_perbaikan") ? old("tgl_perbaikan") :@$dtPerbaikan->tgl_perbaikan }}">
                        @error("tgl_perbaikan")
                            <span id="error-tgl_perbaikan" class="error invalid-feedback">
                                {{ $errors->first("tgl_perbaikan") }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kerusakan">Kerusakan</label>
                        <input type="text" class="form-control  @error("kerusakan") is-invalid  @enderror" id="kerusakan" name="kerusakan" placeholder="Kerusakan" value="{{  old("kerusakan") ? old("kerusakan") : @$dtPerbaikan->kerusakan }}">
                        @error("kerusakan")
                        <span id="error-kerusakan" class="error invalid-feedback">
                            {{ $errors->first("kerusakan") }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="solusi">Solusi</label>
                        <input type="text" class="form-control  @error("solusi") is-invalid  @enderror" id="solusi" name="solusi" placeholder="Solusi" value="{{ old("solusi") ? old("solusi") : @$dtPerbaikan->solusi }}">
                        @error("solusi")
                            <span id="error-solusi" class="error invalid-feedback">
                                {{ $errors->first("solusi") }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="custom-select rounded-0  @error("status") is-invalid  @enderror" id="status" name="status">
                            <option value="" selected="true" disabled>- Pilih Status -</option>
                            <option {{ @$dtPerbaikan->status ==1 ?"selected" : "" }} value="1">Selesai</option>
                            <option {{ @$dtPerbaikan->status ==2 ?"selected" : "" }} value="2">Pending</option>
                        </select>
                        @error("status")
                            <span id="error-status" class="error invalid-feedback">
                                {{ $errors->first("status") }}
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