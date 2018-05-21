<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} | Profil</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ url('/') }}/plugins/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('/') }}/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ url('/') }}/plugins/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('/') }}/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ url('/') }}/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="index2.html" class="navbar-brand"><b>SION</b></a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('profile') }}" class="navbar-brand">Profil</a></li>
                        <li><a href="#" class="navbar-brand">Organisasi</a></li>
                        <li><a href="#" class="navbar-brand">Kegiatan</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="{{ route('logout') }}">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <i class="fa fa-sign-out"></i> Keluar
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-custom-menu -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Profil Pengguna
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-md-12 content-center">

                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" src="{{ url('/') }}/img/avatar5.png" alt="User profile picture">

                                <h3 class="profile-username text-center">{{ $user->nama }}</h3>

                                <p class="text-muted text-center">{{ $user->email }}</p>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                        <!-- About Me Box -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Tentang Saya</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>

                                <p class="text-muted">
                                    {{ $user->jalan }}, {{ $user->kecamatan }}, {{ $user->kabupaten }}, {{ $user->provinsi }}, {{ $user->kode_pos }}
                                </p>

                                <hr>

                                @if ($role == 'relawan')
                                <strong><i class="fa fa-calendar margin-r-5"></i> Tangal Lahir</strong>

                                <p class="text-muted">{{ $user->tanggal_lahir }}</p>

                                <hr>

                                <strong><i class="fa fa-mobile-phone margin-r-5"></i> No. Handphone</strong>

                                <p class="text-muted">{{ $user->no_hp }}</p>

                                <hr>

                                <strong><i class="fa fa-pencil margin-r-5"></i> Keahlian</strong>

                                <p>
                                    <span class="label label-success">{{ $user->keahlian }}</span>
                                </p>

                                <hr>
                                @endif
                                @if ($role == 'donatur')
                                <strong><i class="fa fa-money margin-r-5"></i> Saldo</strong>

                                <p>
                                    <span class="label label-success"> Rp {{ $user->saldo }}</span>
                                </p>

                                <hr>
                                @endif
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->


            </section>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="container">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
            reserved.
        </div>
        <!-- /.container -->
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ url('/') }}/plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ url('/') }}/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{ url('/') }}/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="{{ url('/') }}/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{ url('/') }}/plugins/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('/') }}/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('/') }}/js/demo.js"></script>
<script>
    $(function () {
        $('#example2').DataTable();
    })
</script>
</body>
</html>
