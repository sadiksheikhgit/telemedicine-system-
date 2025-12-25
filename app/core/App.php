<?php

class App
{
    private $controller = 'Home';
    private $method = 'index';
    
    private function splitURL()
    {
        $url = rtrim($_GET['url'] ?? 'home');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $urlParts = explode('/', $url);
        return $urlParts;
    }

    public function loadController()
    {
        $URL = $this->splitURL();
        $filename = "../app/controllers/" . ucfirst($URL[0]) . ".php";
        if (file_exists($filename)) {
            require_once $filename;
            $this->controller = ucfirst($URL[0]);
        } else {
            $filename = "../app/controllers/_404.php";
            require_once $filename;
            $this->controller = '_404';
        }
//show($filename);
        $controller = new $this->controller;
        call_user_func_array([$controller, $this->method], []);
    }
}