<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} | Daftar Sebagai Sponsor</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ url('/') }}/plugins/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('/') }}/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ url('/') }}/plugins/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('/') }}/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('/') }}/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="#"><b>SION</b></a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Daftar Sebagai Sponsor</p>

        <form action="{{ route('register.submit') }}" method="post">
            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    {{ \Session::get('success') }}
                </div>
            @endif
            {{ csrf_field() }}
            <input type="hidden" name="role" value="sponsor" />
                <div class="form-group has-feedback">
                    <input name="nama" type="text" class="form-control" placeholder="Nama" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input name="email" type="email" class="form-control" placeholder="Email" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input name="password" type="password" class="form-control" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input name="provinsi" type="text" class="form-control" placeholder="Provinsi" required>
                    <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input name="kabupaten" type="text" class="form-control" placeholder="Kabupaten" required>
                    <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input name="kecamatan" type="text" class="form-control" placeholder="Kecamatan" required>
                    <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input name="kode_pos" type="text" class="form-control" placeholder="Kode pos" required>
                    <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input name="jalan" type="text" class="form-control" placeholder="Jalan/Desa/Kelurahan/No. rumah" required>
                    <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                </div>
            <div class="form-group has-feedback">
                <input name="logo" type="file" class="form-control" placeholder="Logo">
                <span class="glyphicon glyphicon-picture form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center"></div>

        <a href="{{ route('register') }}" class="text-center">Daftar sebagai role pengguna lainnya</a><br>
        <a href="{{ route('login') }}" class="text-center">Saya sudah mempunyai akun pengguna</a>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="{{ url('/') }}/plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ url('/') }}/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="{{ url('/') }}/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
