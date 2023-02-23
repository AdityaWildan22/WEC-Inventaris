<!DOCTYPE html>
<html lang="en">
@extends('layouts.header')
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/logowec.png">
    <title>WEC INV - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
   
</head>

<body style="color:#057eb3">
    <div class="container">
        <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
        <!-- Outer Row -->
        <div class="row justify-content-center">
            @yield('content')
        </div>

    </div>
    @extends('layouts.footer')
</body>
</html>
