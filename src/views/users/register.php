<div class="login-box">
    <div class="login-logo">
        <a href="./index2.php"><b>Ratih</b>Blog</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <h5 class="login-box-msg">Register</h5>

            <?php if (isset($_GET['success'])) { ?>
                <p class="error" style="background: #b1dfca; color: green; padding: 8px; width: 100%; border-radius: 5px; font-size: 15px;"><?php echo $_GET['success']; ?></p>
            <?php } ?>

            <?php if (isset($_GET['error'])) { ?>
                <p class="error" style="background: #f2dede; color: #A94442; padding: 8px; width: 100%; border-radius: 5px; font-size: 13px;"><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <form action="" method="post" id="quickForm">
                <div class="card-bodsy">
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm_password" class="form-control" id="exampleInputKonfirmasiPassword1" placeholder="Confirm Password">
                    </div>
                </div>
                <!-- /.card-body -->
                <input type="submit" style="background-color: #03a9f4; padding: 5px; width: 110px; border: none; color: #fff; border-radius: 5px;" name="create-user" value="Create">
                <a href="<?= $baseUrl ?>/users/login">
                    <label class="btn btn-secondary mt-1 ml3" style="background-color: #03a9f4; padding: 5px; width: 110px; border: none; color: #fff; border-radius: 5px; font-weight: 500;">Login</label>
                </a>
                <!-- /.col -->
            </form>
        </div>
    </div>

</div>
<!-- /.login-card-body -->
</div>
</div>
<!-- /.login-box -->