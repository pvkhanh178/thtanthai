<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trang Quản Lý</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/admin_source/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/admin_source/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/admin_source/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/admin_source/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="/admin_source/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/admin_source/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/admin_source/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/admin_source/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin_source/plugins/summernote/summernote-bs4.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src='https://cdn.tiny.cloud/1/xf6b6rdyizgkk8bk5yp85v1cj9xyzjbxrhmtqh52tfe88hk2/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
        <script>
            tinymce.init({
              selector: '#tinyEditer'
            });
        </script>
    </head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin.header')
            <div class="content-wrapper">
                @yield('content')
            </div>
        @include('admin.footer')
    </div>
    <script src="/admin_source/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/admin_source/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
{{--     <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script> --}}
    <script src="/admin_source/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/admin_source/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 4 -->
    <script src="/admin_source/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="/admin_source/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/admin_source/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="/admin_source/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/admin_source/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/admin_source/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/admin_source/plugins/moment/moment.min.js"></script>
    <script src="/admin_source/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/admin_source/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/admin_source/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/admin_source/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin_source/dist/js/adminlte.js"></script>
        @yield('script')
    <script>
        $(document).ready(function($){
            $(".table ").DataTable();
        });
    </script>
    </body>
</html>