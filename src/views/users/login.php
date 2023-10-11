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
                    <a href="<?= $baseUrl ?>/users/register" class="text-center mt-1">Register member baru</a>
                </div>
                <!-- /.col -->
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->