<!DOCTYPE html>
<html>

<head>
    @include('layoutsadmin.head')
</head>

<body class="hold-transition sidebar-mini"></body>
    <div class="wrapper">
        <!-- Navbar -->
            @include('layoutsadmin.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
            @include('layoutsadmin.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @yield('contentadmin')
        </div>
        <!-- /.content -->
    </div>



    @include('layoutsadmin.footer')

</body>

</html>
