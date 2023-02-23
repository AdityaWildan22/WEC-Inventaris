@extends('layouts.temp_login')
@section('content')
<script>
    $(function(){
        @if(session("type"))
        showMessage('{{ session("type") }}','{{ session("text") }}','{{ session("icon") }}','{{ session("button") }}');
        @endif
    });
</script>
<div class="col-xl-10 col-lg-10 col-md-9" style="margin-top: 100px">
    <div class="card o-hidden border-0 shadow-lg my-5" style="background-color: rgba(255, 255, 255,0.6)">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-6 bg-login-image"></div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">WEC INVENTARIS V1</h1>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block" style="font-size: 17px">
                                {{ __('Login') }}
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection