<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/plugin/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/plugin/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/plugin/AdminLTE-3.2.0/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Ratih</b>Blog</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Masukan data untuk memulai</p>

                <?php if (isset($_GET['error'])) { ?>
                    <p class="error" style="background: #f2dede; color: #A94442; padding: 8px; width: 100%; border-radius: 5px; font-size: 13px;"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <form method="post" id="login-form">
                    <div class="card-bodsy">
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" name="login" value="true" class="btn btn-primary btn-block">Masuk</button>
                        </div>
                        <a href="../user/create-account.php" class="text-center mt-1">Register member baru</a>
                    </div>
                    <!-- /.col -->
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= $baseUrl ?>/assets/plugin/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= $baseUrl ?>/assets/plugin/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= $baseUrl ?>/assets/plugin/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
    <!-- jquery-validation -->
    <script src="<?= $baseUrl ?>/assets/plugin/AdminLTE-3.2.0/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= $baseUrl ?>/assets/plugin/AdminLTE-3.2.0/plugins/jquery-validation/additional-methods.min.js"></script>

    <!-- Page specific script -->
    <script>
        $(function() {
            $.validator.setDefaults({
                submitHandler: function() {
                    header("refresh:0;./dashboard.php");
                }
            });
            $('#quickForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                },
                messages: {
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Password harus lebih dari 6 karakter"
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
</body>

</html>