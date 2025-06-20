<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <link rel="shortcut icon" href="{{asset('images/front-logo.png')}}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">

    <!-- Styles -->
    <link href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/argon-dashboard.min.css') }}" rel="stylesheet">

    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xa4Fj5cA9qfX1tY+jVt3Dk6U4Fqe3b/+" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    

    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url("{{ asset('/assets/img/loader.gif')}}") 50% 50% no-repeat rgb(249,249,249) ;
            opacity: .8;
            background-size:180px 160px;
        }
    </style>
</head>
<style>
  .dataTables_wrapper .dataTables_info {
      padding: 20px
  }

  .dataTables_wrapper .dataTables_filter {
      padding: 20px;
  }

  .dataTables_wrapper .pagination {
      padding-right: 20px;
  }

  .paginate_button.page-item.active .page-link{
    color: white;
  }

  .video-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -1;
}

.video-background {
    position: fixed;
    top: 0;
    left: 0;
    min-width: 100vw;
    min-height: 100vh;
    width: auto;
    height: auto;
    z-index: -1;
    object-fit: cover;
    background-size: cover;
}


</style>
<body class="g-sidenav-show   bg-gray-300">
    <div id = "myDiv" style="display:none;" class="loader"></div>
    {{-- <div class="min-height-300 bg-primary position-absolute w-100"></div> --}}
    <main class="main-content position-relative border-radius-lg ">
        <video autoplay muted loop playsinline class="video-background">
            <source src="{{ asset('assets/img/bg.mp4') }}" type="video/mp4">
        </video>
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
            <div class="container-fluid py-1 px-3">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                  {{-- <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li> --}}
                  {{-- <li class="breadcrumb-item text-sm text-white active" aria-current="page">@yield('breadcrumb')</li> --}}
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">@yield('page_title')</h6>
              </nav>
              <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
              </div>
            </div>
        </nav>
        <div class="container-fluid py-1">
            @yield('content')
        </div>
    </main>
    {{-- <div id="app">
        
    </div> --}}
    <script src="{{asset('/assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('/assets/js/core/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type='text/javascript'>
        $(document).ready(function () {
            $('.tablewithSearch').DataTable({
                pagingType: 'simple_numbers',
                lengthChange: false,          
                searching: true,
                ordering: true,
                info: true,
                pageLength: 10,
                language: {
                    search: "Search:",
                    paginate: {
                        previous: "<i class='fas fa-chevron-left'></i>",
                        next: "<i class='fas fa-chevron-right'></i>"
                    }
                }
            });

            $('.js-example-basic-multiple').select2();
            $('.select2').select2();
        });

        function show() {
            document.getElementById("myDiv").style.display="block";
        }
        window.addEventListener('load', function () {
            document.getElementById("myDiv").style.display = "none";
        });

        window.addEventListener('pageshow', function (event) {
            document.getElementById("myDiv").style.display = "none";
        });
    </script>
</body>
</html>