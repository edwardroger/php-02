<?php

include('./Controllers/AuthController.php');
//Router: Tuyến đường

$prevPath = '/PHP02/Day-4-04-19/';
// - Method GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    switch ($_SERVER['REQUEST_URI']) {
        case $prevPath . '':
            route('/', 'AuthController', 'login');
            break;
        case $prevPath . 'login':
            var_dump('login page');
            break;
        case $prevPath . 'register':
            var_dump('register page');
        default:
            # code...
            break;
    }
}



// - Method POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_SERVER['REQUEST_URI']) {
        case $prevPath . 'login':
            var_dump('submit form login');
            break;
        default:
            # code...
            break;
    }
}

function route($path, $controller, $action) {
    $object = new $controller();
    $object->$action();
}

// Bài tập: Dựa vào route vừa define ở trên.
// Chuyển hướng trang đến view login.
