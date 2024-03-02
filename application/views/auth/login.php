<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | Medical Record</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url('img') ?>/klinikbpk.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('template_login') ?>/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('template_login') ?>/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('template_login') ?>/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('template_login') ?>/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('template_login') ?>/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('template_login') ?>/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('template_login') ?>/css/main.css">
    <!--===============================================================================================-->


</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="<?php echo base_url('img') ?>/klinikbpk.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="post" action="<?= base_url('login') ?>">
                    <span class="login100-form-title">
                        LOGIN
                    </span>
                    <?= $this->session->flashdata('message') ?>
                    <div class="wrap-input100">
                        <input class="input100" type="text" name="email" placeholder="Email" value="<?= set_value('email') ?>">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <small class="text-danger"><?= form_error('email'); ?></small>

                    <div class="wrap-input100">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <small class="text-danger"><?= form_error('password'); ?></small>

                    <div class="p-t-12">
                        <a class="txt2" href="<?php echo base_url('lupapassword') ?>">
                            &nbsp; Lupa Password ?
                        </a>

                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <!-- <div class="text-center p-t-30">
                        <span class="txt1">
                            Belum Punya Akun ?
                        </span>
                        <a class="txt2" href="<?php echo base_url('registrasi') ?>">
                            Buat Akun
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div> -->
                    <br>
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="<?php echo base_url('template_login') ?>/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('template_login') ?>/vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo base_url('template_login') ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('template_login') ?>/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('template_login') ?>/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('template_login') ?>/js/main.js"></script>

</body>

</html>