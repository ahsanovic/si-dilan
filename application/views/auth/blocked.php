<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/favicon.ico">

        <!-- App title -->
        <title>Koperasi Praja Makmur</title>

        <!-- Bootstrap CSS -->
        <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- App CSS -->
        <link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet" type="text/css" />

        <!-- Modernizr js -->
        <script src="<?= base_url() ?>/assets/js/modernizr.min.js"></script>

    </head>


    <body>

        <div class="account-pages-blocked"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">

        	<div class="ex-page-content text-center">
                <div class="text-error">4<span class="ion-sad"></span>3</div>
                <h3 class="text-uppercase text-danger font-600">Oops..!! Access Forbidden</h3>
                <p class="text-danger m-t-30">
                    Anda tidak diperbolehkan mengakses halaman ini. <br/>Silahkan tekan tombol di bawah untuk kembali!
                </p>
                <br>
                    <a class="btn btn-pink waves-effect waves-light" href="<?= site_url('dashboard') ?>"> kembali ke dashboard</a>
            </div>

        </div>
        <!-- end wrapper page -->


        

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>

    </body>
</html>