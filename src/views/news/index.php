<div class="wrapper">
    <!-- Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>News</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= $baseUrl ?>/view/dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">News</li>
                        </ol>
                    </div>
                </div>
                <div class="mt-3"><a href="<?= $baseUrl ?>/news/create" style="background-color: #007bff; padding: 5px;  border: none; color: #fff; border-radius: 5px;">+ &nbsp; Create News</a></div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <?php
            if (isset($_GET['berhasil'])) {
            ?>
                <div class="alert" style="background-color: #b1dfca; height: 50px; font-style: italic; font-weight: 500; color: green">
                    <p><?php echo $_GET['berhasil']; ?></p>
                    <button onclick="closeAlert(this.parentNode)" style="position: absolute; top: 0; right: 0; background-color: #b1dfca; border: none; color: green;"><i class="fas fa-times"></i></button>
                </div>
            <?php } ?>
            <div class="card">
                <form class="card-header" method="GET">
                    <i class="fas fa-search"></i>
                    <input type="text" name="cari_disini" placeholder="Cari disini" value="<?php if (isset($_GET['cari_disini'])) {
                                                                                                echo $_GET['cari_disini'];
                                                                                            } ?>">

                    <input type="submit" value="Cari">
                </form>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            echo $totalPages == 0 ? '<tr><td colspan="7">Tidak ada data ditemukan</td></tr>' : '';

                            $no = ($page - 1) * $limit + 1;

                            foreach ($rows as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><img src="<?= $baseUrl ?>/assets/img/<?php echo $row['image'] != '' ? $row['image'] : 'default-news.png'; ?>" style="width: 50px; height: 50px;"></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td><?php echo $row['created_at']; ?></td>
                                    <td><?php echo $row['updated_at']; ?></td>
                                    <td>
                                        <a style="background-color: #03a9f4; padding: 5px;  border: none; color: #fff; " href="<?= $baseUrl ?>/news/update?id=<?php echo $row['id']; ?>"><i class="fas fa-edit" title="Edit"></i></a>
                                        <a style="background-color: salmon; padding: 5px;  border: none; color: #fff; " href="<?= $baseUrl ?>/news/index?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin ingin menghapus berita ini?')"><i class="fas fa-trash-alt" title="Delete"></i></a>
                                        <a style="background-color: cornflowerblue; padding: 5px;  border: none; color: #fff; " href="<?= $baseUrl ?>/news/detail?id=<?php echo $row['id']; ?>"><i class="fas fa-eye" title="View"></i></a>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <?php
                        if ($page > 1) {
                            echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '&cari_disini=' . $keyword . '">&laquo;</a></li>';
                        }

                        for ($i = 1; $i <= $totalPages; $i++) {
                            echo '<li class="page-item';
                            if ($i == $page) {
                                echo ' active';
                            }
                            echo '"><a class="page-link" href="?page=' . $i . '&cari_disini=' . $keyword . '">' . $i . '</a></li>';
                        }

                        if ($page < $totalPages) {
                            echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '&cari_disini=' . $keyword . '">&raquo;</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>