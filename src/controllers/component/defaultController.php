<?php

namespace src\controllers\component; // Ubah namespace menjadi src\controllers


class DefaultController
{
    public $baseUrl;
    public $baseDir;

    function render($filename, $vars = null)
    {
        $requestUrls = explode('/', $_SERVER['REQUEST_URI']);

        $baseUrl = "/$requestUrls[1]";
        if (is_array($vars) && !empty($vars)) {
            extract($vars);
            $vars[] = $baseUrl;
        } else {
            extract([$baseUrl]);
        }

        ob_start();
        include 'src/views/' . $requestUrls[2] . '/' . $filename . '.php';
        return ob_get_clean();
    }

    function redirect($path, $vars = null)
    {
        $params = '';
        $i = 0;
        if (is_array($vars) && !empty($vars)) {
            foreach ($vars as $key => $value) {
                $symbol = "&";
                if ($i == 0) {
                    $symbol = "";
                }
                $params .=  "$symbol$key=$value";

                $i++;
            }

            $params = "?" . $params;
        }

        header("Location: ../" . $path . $params); // header("Location: ../src/views/users/index.php?error=Email is required&error2=Email is required");
        exit;
    }

    function log($value)
    {
        echo '<pre>';
        print_r($value);
        echo '<pre>';
    }

    public function menu()
    {
        $profileImage = '../assets/img/default-profile.png';
        print_r("tes");

        print_r($this->baseUrl);
        $name = '';
        if (isset($_SESSION['email']) && isset($_SESSION['name'])) {
            if (isset($_SESSION['photo']) && !empty($_SESSION['photo'])) {
                $profileImage = $this->baseUrl . '../assets/img/' . $_SESSION['photo'];
            }
            $profileImage = "<img src='" . $profileImage . "' class='img-circle elevation-2' alt='User Image'>";

            if (empty($_SESSION['name'])) {
                $name = "<a href='" . $this->baseUrl . "../users/profile' class='d-block'>" . $_SESSION['email'] . "</a>";
            } else {
                $name = "<a href='" . $this->baseUrl . "../users/profile' class='d-block'>" . $_SESSION['name'] . "</a>";
            }
        }

        return "<aside class='main-sidebar sidebar-dark-primary elevation-4' style='height: 146vh;'>
        <!-- Brand Logo -->
        <a href='#' class='brand-link'>
            <img src='" . $this->baseUrl . "../assets/plugin/AdminLTE-3.2.0/dist/img/ratih.webp' alt='AdminLTE Logo' class='brand-image img-circle elevation-3' style='opacity: .8'>
            <span class='brand-text font-weight-light'>Ratih Blog</span>
        </a>
    
        <!-- Sidebar -->
        <div class='sidebar'>
            <!-- Sidebar user (optional) -->
            <div class='user-panel mt-3 pb-3 mb-3 d-flex'>
                <a href='" . $this->baseUrl . "../users/profile' class='image'>" . $profileImage . "</a>
                <div class='info'>" . $name . "</div>
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
                        <a href='" . $this->baseUrl . "/view/dashboard.php' class='nav-link'>
                            <i class='fas fa-chart-bar'></i>
                            <p style='margin-left: 10px;'>
                                Dashboard
                            </p>
                        </a>
                    </li> -->
                    <li class='nav-item'>
                        <a href='" . $this->baseUrl . "../news/index' class='nav-link'>
                            <i class='nav-icon fas fa-blog'></i>
                            <p>
                                News
                            </p>
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a href='" . $this->baseUrl . "../category/index' class='nav-link'>
                            <i class='nav-icon fas fa-book'></i>
                            <p>
                                Category News
                            </p>
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a href=' " . $this->baseUrl . "../users/logout' class='nav-link' onclick=\"return confirm('Anda yakin ingin Logout?')\">
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
    </aside>";
    }
}
