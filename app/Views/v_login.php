<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Arsip | <?= $title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        body {
            background: url('foto/background.jpg') no-repeat center center fixed;
            overflow: hidden;
            background-size: cover;
        }

        .navbar {
            background-color: transparent;
            overflow: hidden;
            display: flex;
            align-items: center;

        }

        .navbar a {
            font-size: 3rem;
            float: left;
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .log-box {
            margin-inline: 45rem;
        }

        .navbar .logo {
            float: left;
        }

        .login-box-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-shadow: -1px 2px 8px 2px rgba(0, 0, 0, 0.41);
            -webkit-box-shadow: -1px 2px 8px 2px rgba(0, 0, 0, 0.41);
            -moz-box-shadow: -1px 2px 8px 2px rgba(0, 0, 0, 0.41);
        }

        .l-head {
            display: flex;
            flex-direction: column;
            max-width: 240px;
            margin: 0 auto;
            float: left;
        }

        .uti {
            text-align: center;
            color: #D8AA07;
            font-weight: bold;
            font-size: 2.4rem;
        }

        .uti i {
            color: #635279;
            font-style: normal;
        }

        .gin {
            text-align: center;
            font-size: large;
            margin: 0 auto;
        }

        .line {
            display: block;
            background-color: #004131;
            margin-block: 1rem;
            height: 1.6px;
            width: 100%;
        }
    </style>
</head>

<body class="hold-transition ">

    <div class="navbar">
        <a class="logo" href="#"><img src="foto/uti.png" width="60" alt="Logo"></a>
        <a href="#"><b> Arsip Teknokrat </b></a>
        <!-- Tambahkan menu lainnya sesuai kebutuhan -->
    </div>

    <div class="log-box">
        <!-- <div class="login-logo">
            <a href="<"><b>Arsip</b>Tekno</a>
        </div> -->
        <!-- /.login-logo -->
        <div class="login-box-body" style="border-radius: 10px;">
            <div class="l-head">
                <h3 class="uti">Universitas <i>Teknokrat</i> <i style="color:#5403FF">Indonesia</i></h3>
                <span class="line"></span>
                <h3 class="gin">Please Login</h3>
                <span class="line"></span>
            </div>

            <div class="row " style="margin-top: -30px;">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <!-- <div class="col-xs-4">
                    <h3><i class="fa fa-qrcode" style="margin-left: 50px; "></i></h3>
                </div> -->
                <!-- /.col -->
            </div>

            <?php
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
                <div class="alert alert-danger alert-dismissible">
                    <ul>
                        <?php foreach ($errors as $key => $value) { ?>
                            <li><?= esc($value) ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php }
            ?>

            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-danger alert-dismissible">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
                # code...
            }
            ?>
            <?php echo form_open('auth/login') ?>
            <div class="form-group has-feedback">
                <label for="username" style="color: black;">Username</label>
                <input type="text" class="form-control" placeholder="Email/Nomor Telepon" name="email" style="border-width: 1.5px; border-color: gray; border-radius: 10px;">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <label for="password" style="color: black;">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" style="border-width: 1.5px; border-color: gray; border-radius: 10px;">
                <span class=" glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="social-auth-links text-center">
                <button type="submit" class="btn btn-block btn-flat" style="background-color: #5403FF; border-width: 2px; border-radius: 10px; color: white; margin-block:2rem;">Login</button>
            </div>
            <!-- /.social-auth-links -->
            <a href="#" style="color: #9766FF; text-align: center; display: flex; padding-left: 120px;">Lupa Password?</a><br>

            <?php echo form_close() ?>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="<?= base_url() ?>/template/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url() ?>/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url() ?>/template/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>

</html>