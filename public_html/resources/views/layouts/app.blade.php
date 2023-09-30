<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $pageTitle ?? config('app.name', 'MCIPK Document') }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet" />

    {{-- select2 --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.min.css') }}" />

    {{-- toastr --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css') }}" />

    <style>
        .text-red-600 {
        --tw-text-opacity: 1;
        color: rgb(220 38 38 / var(--tw-text-opacity));
        }
        .text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem;
        }
        ul{
            list-style: none;
            padding:0px;
        }
        .action-icons a{

            margin: 0px 0px 0px 3px!important;

        }

        .sidebar_logo
        {
            width :70px;
            height:70px;
        }
        
        .sidebar_logo img
        {
            width :70px;
            height:70px;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }


    </style>

    
    @yield('style')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        {{-- sidebar start--}}
        @include('includes.sidebar')
        {{-- sidebar end--}}

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                {{-- navbar start --}}
                @include('includes.nav')
                {{-- navbar end --}}

                @yield('content')

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        {{-- <span>Copyright &copy; Your Website 2021</span> --}}
                        <span>{{ config('app.name') }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- test Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

    {{-- select2 --}}
    <script src="{{ asset('assets/vendor/select2/select2.min.js') }}" ></script>

    {{-- tostr --}}
    <script src="{{ asset('assets/vendor/toastr/toastr.min.js') }}"></script>

    <script>

        // $(document).ready(function() {
        //     $("body").tooltip({ selector: '[data-toggle=tooltip]' });
        // });

        function show_error_(_error_msg) {
            toastr.error(_error_msg, "", {
            positionClass: "toast-top-right",
            timeOut: 5e3,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1,
            });
        }

        function show_success_(_succes_msg) {
            toastr.success(_succes_msg, "", {
            positionClass: "toast-top-right",
            timeOut: 5e3,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1,
            });
        }

        // select2
        $('.select2').select2({
            width : '100%',
        })

    </script>
    
    @if (Session::has('success'))
        
    <script>
        const success_msg = "{{ Session::get('success') }}"
        show_success_(success_msg)
    </script>
    
    @endif

    @if (Session::has('error'))
        
    <script>
        const error_msg = "{{ Session::get('error') }}"
        show_error_(error_msg)
    </script>

    @endif

    @yield('script')

</body>

</html>
