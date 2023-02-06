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
<form action="{{ url('barang/save')}}" method="post">
    @csrf
    <div class="row mb-5">
        <div class="col-md-2">

        </div>
        <div class="dt_member col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="kd_barang">Kode Barang</label>
                        <input type="hidden" name="id_barang" value="{{ @$dtBarang->id_barang}}">
                        <input type="hidden" name="id_kat" value="{{ @$dtBarang->id_kat}}">
                        <input type="text" class="form-control  @error("kd_barang") is-invalid  @enderror" id="kd_barang" name="kd_barang" placeholder="Kode Barang" value="{{ old("kd_barang") ? old("kd_barang") : @$dtBarang->kd_barang }}">
                        @error("kd_barang")
                        <span id="error-kd_barang" class="error invalid-feedback">
                            {{ $errors->first("kd_barang") }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nm_barang">Nama Barang</label>
                        <input type="text" class="form-control @error("nm_barang") is-invalid  @enderror" id="nm_barang" name="nm_barang" placeholder="Nama Barang" value="{{  old("nm_barang") ? old("nm_barang") :@$dtBarang->nm_barang }}">
                        @error("nm_barang")
                            <span id="error-nm_barang" class="error invalid-feedback">
                                {{ $errors->first("nm_barang") }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nm_cat">Kategori</label>
                        <select class="custom-select rounded-0" id="id_kat" name="id_kat">
                            <option value="" selected="true" disabled>- Pilih Kategori -</option>
                            @foreach ($kategori as $kat)
                                <option value="{{ @$kat->id_kat }}" {{@$kat->id_kat !="" ? @$kat->id_kat == @$dtBarang->id_kat ? "selected" : "" :"" }}>{{ @$kat->nm_kat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl_pembelian">Tanggal Pembelian</label>
                        <input type="text" class="form-control @error("tgl_pembelian") is-invalid  @enderror" id="tgl_pembelian" name="tgl_pembelian" placeholder="Tanggal Pembelian" value="{{  old("tgl_pembelian") ? old("tgl_pembelian") :@$dtBarang->tgl_pembelian }}">
                        @error("tgl_pembelian")
                            <span id="error-tgl_pembelian" class="error invalid-feedback">
                                {{ $errors->first("tgl_pembelian") }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control  @error("harga") is-invalid  @enderror" id="harga" name="harga" placeholder="Harga" value="{{  old("harga") ? old("harga") : @$dtBarang->harga }}">
                        @error("harga")
                        <span id="error-harga" class="error invalid-feedback">
                            {{ $errors->first("harga") }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tempat">Tempat</label>
                        <input type="text" class="form-control  @error("tempat") is-invalid  @enderror" id="tempat" name="tempat" placeholder="Tempat" value="{{ old("tempat") ? old("tempat") : @$dtBarang->tempat }}">
                        @error("tempat")
                            <span id="error-tempat" class="error invalid-feedback">
                                {{ $errors->first("tempat") }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ket">Keterangan</label>
                        <textarea class="form-control  @error("ket") is-invalid  @enderror" id="ket" name="ket" placeholder="Keterangan">{{ old("ket") ? old("ket") : @$dtBarang->ket }}</textarea>
                        @error("ket")
                        <span id="error-ket" class="error invalid-feedback">
                            {{ $errors->first("ket") }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="custom-select rounded-0  @error("status") is-invalid  @enderror" id="status" name="status">
                            <option value="" selected="true" disabled>- Pilih Status -</option>
                            <option {{ @$dtBarang->status ==1 ?"selected" : "" }} value="1">Baik</option>
                            <option {{ @$dtBarang->status ==2 ?"selected" : "" }} value="2">Rusak</option>
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