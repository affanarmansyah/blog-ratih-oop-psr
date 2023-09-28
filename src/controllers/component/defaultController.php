<?php

namespace src\controllers\component; // Ubah namespace menjadi src\controllers


class DefaultController
{

    function render($filename, $vars = null)
    {
        $requestUrls = explode('/', $_SERVER['REQUEST_URI']);

        if (is_array($vars) && !empty($vars)) {
            extract($vars);
            $baseUrl = "/$requestUrls[1]";
            $vars[] = $baseUrl;
        }
        ob_start();
        include 'src/views/' . $requestUrls[2] . '/' . $filename . '.php';
        return ob_get_clean();
    }
}
