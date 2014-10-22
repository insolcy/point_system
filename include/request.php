<?php
    header("Content-Type: text/html; charset=utf-8");
    $method = $_SERVER['REQUEST_METHOD'];
    $isGet = false;
    $isPost = false;
    if ($method == 'GET') {
        $isGet = true;
    } else if ($method == 'POST') {
        $isPost = true;
    }
    $get = $_GET;
    $post = $_POST;
?>