<?php

namespace src\controllers\component; // Ubah namespace menjadi src\controllers


class DefaultController
{
    public $baseUrl;
    public $baseDir;
    public $template;

    public function __construct()
    {
        header('Content-Type: application/json');
    }

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

        $this->baseUrl = $baseUrl;

        ob_start();
        include 'src/views/' . $requestUrls[2] . '/' . $filename . '.php';

        $content = ob_get_clean();

        ob_start();

        extract([$content]);
        // include 'src/views/' . $requestUrls[2] . '/' . $filename . '.php';
        include 'src/views/templates/'  . $this->template . '.php'; // src/views/templates/news/news-template.php


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
}
