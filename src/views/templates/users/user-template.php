<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | General Form Elements</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/plugin/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/plugin/AdminLTE-3.2.0/dist/css/adminlte.min.css">
</head>

<?php
$profileImage = $baseUrl . '/assets/img/default-profile.png';
$name = '';
if (isset($_SESSION['email']) && isset($_SESSION['name'])) {
    if (isset($_SESSION['photo']) && !empty($_SESSION['photo'])) {
        $profileImage = $baseUrl . '/assets/img/' . $_SESSION['photo'];
    }
    $profileImage = "<img src='" . $profileImage . "' class='img-circle elevation-2' alt='User Image'>";

    if (empty($_SESSION['name'])) {
        $name = "<a href='" . $baseUrl . "/users/profile' class='d-block'>" . $_SESSION['email'] . "</a>";
    } else {
        $name = "<a href='" . $baseUrl . "/users/profile' class='d-block'>" . $_SESSION['name'] . "</a>";
    }
}
?>

<body>
    <aside class='main-sidebar sidebar-dark-primary elevation-4' style='height: 146vh;'>
        <!-- Brand Logo -->
        <a href='#' class='brand-link'>
            <img src='<?= $baseUrl ?>/assets/plugin/AdminLTE-3.2.0/dist/img/ratih.webp' alt='AdminLTE Logo' class='brand-image img-circle elevation-3' style='opacity: .8'>
            <span class='brand-text font-weight-light'>Ratih Blog</span>
        </a>

        <!-- Sidebar -->
        <div class='sidebar'>
            <!-- Sidebar user (optional) -->
            <div class='user-panel mt-3 pb-3 mb-3 d-flex'>
                <a href='<?= $baseUrl ?>/users/profile' class='image'><?= $profileImage ?></a>
                <div class='info'><?= $name ?></div>
            </div>

            <!-- SidebarSearch Form -->
            <div class='form-inline'>
                <div class='input-group' data-widget='sidebar-search'>
                    <input class='form-control form-control-sidebar' type='search' placeholder='Search' aria-label='Search'>
                    <div class='input-group-append'>
                        <button class='btn btn-sidebar'>
                            <i class='fas fa-search fa-fw'></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class='mt-2'>
                <ul class='nav nav-pills nav-sidebar flex-column' data-widget='treeview' role='menu' data-accordion='false'>
                    <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                    <!-- <li class='nav-item ml-1'>
                        <a href='" . $baseUrl . "/view/dashboard.php' class='nav-link'>
                            <i class='fas fa-chart-bar'></i>
                            <p style='margin-left: 10px;'>
                                Dashboard
                            </p>
                        </a>
                    </li> -->
                    <li class='nav-item'>
                        <a href='<?= $baseUrl ?>/news/index' class='nav-link'>
                            <i class='nav-icon fas fa-blog'></i>
                            <p>
                                News
                            </p>
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a href='<?= $baseUrl ?>/category/index' class='nav-link'>
                            <i class='nav-icon fas fa-book'></i>
                            <p>
                                Category News
                            </p>
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a href=' <?= $baseUrl ?>/users/logout' class='nav-link' onclick="return confirm('Anda yakin ingin Logout?')">
                            <i class='nav-icon fas fa-arrow-alt-circle-right'></i>
                            <p>
                                LogOut
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <?= $content ?>

    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= $baseUrl ?>/assets/plugin/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= $baseUrl ?>/assets/plugin/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="<?= $baseUrl ?>/assets/plugin/AdminLTE-3.2.0/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= $baseUrl ?>/assets/plugin/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>

    <!-- Page specific script -->
    <script>
        $(function() {
            bsCustomFileInput.init();
        });

        function closeAlert(element) {
            element.style.display = 'none';
        }
    </script>
</body>

</html>