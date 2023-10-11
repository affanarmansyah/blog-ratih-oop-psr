<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Profil </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= $baseUrl ?>/view/dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Detail Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content col-md-4">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body p-0 ">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td><?php echo $result['id']; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $result['email']; ?></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td><?php echo $result['name'] ? $result['name'] : "Tidak Ada Nama"; ?></td>
                            </tr>
                            <tr>
                                <th>Photo</th>
                                <td><?php echo $result['photo'] ? $result['photo'] : "default-profile.png"; ?></td>
                            </tr>
                            <tr>
                                <th>Created_at</th>
                                <td><?php echo $result['created_at']; ?></td>
                            </tr>
                            <tr>
                                <th>Update_at</th>
                                <td><?php echo $result['updated_at']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div><!-- /.container-fluid -->
        </section>
        <a href="<?= $baseUrl ?>/users/profile">
            <label class="btn btn-secondary " style="margin-left: 10px; padding: 5px; width: 110px; border: none; color: #fff; border-radius: 5px; font-weight: 500;">Back</label>
        </a>
        <a href="<?= $baseUrl ?>/users/update">
            <label class="btn btn-primary " style="padding: 5px; width: 110px; border: none; color: #fff; border-radius: 5px; font-weight: 500;">Edit</label>
        </a>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>