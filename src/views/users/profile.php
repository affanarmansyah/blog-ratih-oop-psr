<div class="wrapper">
    <!-- Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
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
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">

                                    <div class="text-center">
                                        <?php
                                        if (isset($_SESSION['email']) && isset($_SESSION['name'])) {
                                            $profileImage = "" . $baseUrl . "/assets/img/default-profile.png";
                                            if (isset($_SESSION['photo']) && !empty($_SESSION['photo'])) {
                                                $profileImage = "" . $baseUrl . "/assets/img/" . $_SESSION['photo'];
                                            }
                                            echo '<img src="' . $profileImage . '" class="profile-user-img img-fluid img-circle" alt="User Image">';
                                        }
                                        ?>

                                    </div>
                                    <p class="text-muted text-center">Software Engineer</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Name</b> <a class="float-right"><?php echo $_SESSION['name']; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Info</b> <a class="float-right">Busy</a>
                                        </li>

                                    </ul>
                                    <a href="<?= $baseUrl ?>/users/update?id=<?php echo $_SESSION['id']; ?>">
                                        <label class="btn btn-primary float-right mt-1" style="font-weight: 500;">Edit</label>
                                    </a>
                                    <a href="<?= $baseUrl ?>/users/detail?id=<?php echo $_SESSION['id']; ?>">
                                        <label class="btn btn-secondary mt-1" style="font-weight: 500;">Detail Profile</label>
                                    </a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </form>

                    </div>
                </div>
            </div>
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