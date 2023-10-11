<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-4">
            <div class="card card-primary">
              <form action="" method="post" id="quickForm" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="text-center mb-3">
                    <?php
                    $profileImage = "" . $baseUrl . "/assets/img/default-profile.png";
                    if (isset($_SESSION['photo']) && !empty($_SESSION['photo'])) {
                      $profileImage = "" . $baseUrl . "/assets/img/" . $_SESSION['photo'];
                    }
                    echo '<img src="' . $profileImage . '" class="profile-user-img img-fluid img-circle" alt="User Image">';
                    ?>
                  </div>
                  <div>
                    <?php if (isset($_GET['success'])) { ?>
                      <p class="error" style="background: #b1dfca; color: green; padding: 8px; width: 100%; border-radius: 5px; font-size: 15px;"><?php echo $_GET['success']; ?></p>
                    <?php } ?>
                    <?php if (isset($_GET['error'])) { ?>
                      <p class="error" style="background: #f2dede; color: #A94442; padding: 8px; width: 100%; border-radius: 5px; font-size: 13px; margin-top: 10px;"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                    <label for="exampleName1">Name</label>
                    <input type="text" value="<?php echo $_SESSION['name']; ?>" name="name" class="form-control" id="exampleName1" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="text" value="<?php echo $_SESSION['email']; ?>" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="exampleInputKonfirmasiPassword1" placeholder="Confirm Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Photo</label>
                    <div class="input-group">
                      <div class="form-group">
                        <input type="file" name="photo">
                      </div>
                    </div>
                    <input type="submit" style="background-color: #03a9f4; padding: 5px; margin-top: 20px; width: 110px; border: none; color: #fff; border-radius: 5px;" name="submit" value="Save" class="float-right">
                    <a href="<?= $baseUrl ?>/users/profile">
                      <label class="btn btn-secondary " style=" margin-top: 20px; padding: 5px; width: 110px; border: none; color: #fff; border-radius: 5px; font-weight: 500;">Back</label>
                    </a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->