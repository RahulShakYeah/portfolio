<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blogger | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/blogger.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link text-center" style="text-transform: uppercase">
            <span class="brand-text font-weight-light">Blogger</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('images/admin-avatar.png')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="" class="d-block">{{auth()->user()->email}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item mt-2 mb-2">
                        <a href="{{route('blogger')}}" class="nav-link @yield('status')">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>

                    </li>
                    <li class="nav-item mt-2 mb-2">
                        <a href="{{route('blogger.list')}}" class="nav-link @yield('catstatus')">
                            <i class="nav-icon fas fa-fw fa-sitemap"></i>
                            <p>
                                Category

                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview mt-2 mb-2">
                        <a href="{{route('blog.list')}}" class="nav-link @yield('blogstatus')">
                            <i class="nav-icon fas fa-fw fa-newspaper"></i>
                            <p>
                                Blog
                            </p>
                        </a>

                    </li>

                    <li class="nav-item has-treeview mt-2 mb-2">
                        <a href="{{route('album.index')}}" class="nav-link @yield('image')">
                            <i class="nav-icon fas fa-images"></i>
                            <p>
                                Image Gallery

                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview mt-2 mb-2">
                        <a href="{{route('video.index')}}" class="nav-link @yield('videostatus')">
                            <i class="nav-icon fas fa-fw fa-video"></i>
                            <p>
                                Video Gallery
                            </p>
                        </a>

                    </li>

                    <li class="nav-item has-treeview mt-2 mb-2">
                        <a href="{{ route('logout') }}" class="nav-link"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-fw fa-power-off"></i>
                            <p>
                                Logout
                            </p>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                </ul>

            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @include('blogger.message')
                @yield('content')

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.3-pre
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="{{asset('js/manifest.js')}}"></script>
<script src="{{asset('js/vendor.js')}}"></script>
<script src="{{asset('js/blogger.js')}}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#usertable').DataTable();
    });
    $(document).ready(function () {
        $('.summernote').summernote();
    });
</script>


</body>
</html>
