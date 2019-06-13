<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>    

    <!-- App Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/fav.png') }}">

    <!-- DataTables -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Multi Item Selection examples -->
    <link href="{{ asset('assets/plugins/datatables/select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">

    <!-- Switchery css -->
    <link href="{{ asset('assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
   <!--  <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet"> -->
    
    <style type="text/css">
        .container {
                width: 95%;
                max-width: 100%;
            }
            html,body{
                background-color: #64b0f2;
                /*font-family: 'Questrial', sans-serif;*/
                font-family: serif;
            }
            /*.table td, .table th{
                padding: 3px 3px;
            }*/
    </style>
</head>

 <body>
<span id="start"></span>
        <h2 class="text-center" style="padding-top: 2%;
    font-weight: 800;color: white;">Employee Performance Report</h2>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
         
        <div class="wrapper" style="padding-top: 25px;">

            <div class="container">                
                
                <!-- Page-Title -->
                @yield('content')                
                <!-- end row -->
               
            </div> <!-- container -->

 
            <!-- Footer -->
            <footer class="footer">
                © {{env('APP_NAME')}}.
            </footer>
            <!-- End Footer -->

        </div> <!-- End wrapper -->
        <span  id="end"></span>

        <!-- jQuery  -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/waves.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('assets/plugins/switchery/switchery.min.js') }}"></script>

        
        <!-- Required datatable js -->
        <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
        

       

        <!-- Responsive examples -->
        <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

        <!-- Selection table -->
        <script src="{{ asset('assets/plugins/datatables/dataTables.select.min.js') }}"></script>
        <!-- Counter Up  -->
        <script src="{{ asset('assets/plugins/waypoints/lib/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/counterup/jquery.counterup.js') }}"></script>

        

        <!-- App js -->
        <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.app.js') }}"></script>
        <!-- <script type="text/javascript">
            function down() {
    $('html, body').animate({ scrollTop: $('#end').offset().top }, 10000);
    up();
    };
    function up() {
        $('html, body').animate({ scrollTop: $('#start').offset().top }, 10000);
        down();
    };
        $(document).ready(function () {
        up();
    });
        </script> -->
       <!--  <script type="text/javascript">
            $('html, body').animate({ scrollTop: $(document).height() - $(window).height() }, 10000, function() {
    $(this).animate({ scrollTop: 0 }, 10000);
});
        </script> -->
    </body>
</html>