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
<form action="{{ url('user/save')}}" method="post">
    @csrf
    <div class="row mb-5">
        <div class="col-md-2">

        </div>
        <div class="dt_user col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="hidden" name="id" value="{{ @$dtUser->id}}">
                        <input type="text" class="form-control  @error("username") is-invalid  @enderror" id="username" name="username" placeholder="Username" value="{{ old("username") ? old("username") : @$dtPerbaikan->username }}">
                        @error("username")
                        <span id="error-username" class="error invalid-feedback">
                            {{ $errors->first("username") }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error("password") is-invalid  @enderror" id="password" name="password" placeholder="Password" value="{{  old("password") ? old("password") :@$dtPerbaikan->password }}">
                        @error("password")
                            <span id="error-password" class="error invalid-feedback">
                                {{ $errors->first("password") }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="custom-select rounded-0  @error("role") is-invalid  @enderror" id="role" name="role">
                            <option value="" selected="true" disabled>- Pilih Role -</option>
                            <option {{ @$dtUser->role == "Admin" ? "selected" : "" }} value="Admin">Admin</option>
                            <option {{ @$dtUser->role == "Operator" ? "selected" : "" }} value="Operator">Operator</option>
                        </select>
                        @error("role")
                            <span id="error-role" class="error invalid-feedback">
                                {{ $errors->first("role") }}
                            </span>
                        @enderror 
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="custom-select rounded-0 @error("status") is-invalid  @enderror" id="status" name="status">
                            <option value="" selected="true" disabled>- Pilih Status -</option>
                            <option {{ @$dtUser->status == 1 ? "selected" : "" }} value="1">Aktif</option>
                            <option {{ @$dtUser->status == 2 ? "selected" : "" }} value="2">Non Aktif</option>
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