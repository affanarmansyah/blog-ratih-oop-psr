<?php

namespace src\utilities;

class Route
{
    private string $version;
    private string $prefix;

    private function run(string $path, $controller, string $method)
    {
        $requestUrls = explode('/', $_SERVER['REQUEST_URI']);
        $actionExplode = explode('?', $requestUrls[3]);

        if ($requestUrls[2] === '') {
            http_response_code(404);

            return json_encode(["message" => "Api not found"]);
        }

        $urlPath = $requestUrls[2] . "" . $actionExplode;

        if ($urlPath === $path) {
            return $controller;
        } else {
            http_response_code(404);

            return json_encode(["message" => "Api not found"]);
        }
    }

    protected function POST(string $path, $controller)
    {
        $this->run($path, $controller, "POST");
    }

    protected function GET(string $path, $controller)
    {
    }

    public function setVersion(string $version)
    {
        $this->version = $version;
    }

    public function setPrefix(string $prefix)
    {
        $this->prefix = $prefix;
    }
}
