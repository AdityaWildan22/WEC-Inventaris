<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/logowec.png">
    <title>WEC INV - @yield('judul')</title>
</head>
@include('layouts.header')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('layouts.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

              @include('layouts.navbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('sub_judul')</h1>
                    </div>
                    @yield('content')
                </div>
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto" style="color: black">
                            <strong><span>Copyright &copy; WEC MADIUN <?php 
                                echo date('Y')?></span></strong>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->  
            </div>
        </div>         
    </div>
    @include('layouts.footer')
</body>

</html>