<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail News </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= $baseUrl ?>/view/dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Detail News</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content col-md-4">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body p-0 ">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td><?php echo $detail['id']; ?></td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td><?php echo $detail['image'] ? $detail['image'] : 'default-news.png'; ?></td>

                            </tr>
                            <tr>
                                <th>Description</th>
                                <td><?php echo $detail['description']; ?></td>

                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><?php echo $detail['status']; ?></td>

                            </tr>
                            <tr>
                                <th>Category</th>
                                <td><?php echo ucwords($detail['category']); ?></td>

                            </tr>
                            <tr>
                                <th>Created_at</th>
                                <td><?php echo $detail['created_at']; ?></td>

                            </tr>
                            <tr>
                                <th>Update_at</th>
                                <td><?php echo $detail['updated_at']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div><!-- /.container-fluid -->
        </section>
        <a href="<?= $baseUrl ?>/news/index">
            <label class="btn btn-secondary " style="margin-left: 10px; padding: 5px; width: 110px; border: none; color: #fff; border-radius: 5px; font-weight: 500;">Back</label>
        </a>
        <!-- <a href="edit_news.php">
                <label class="btn btn-primary " style="padding: 5px; width: 110px; border: none; color: #fff; border-radius: 5px; font-weight: 500;">Edit</label>
            </a> -->
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>