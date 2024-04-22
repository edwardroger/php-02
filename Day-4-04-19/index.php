<?php

include('./Controllers/AuthController.php');
include('./Controllers/HomeController.php');
//Router: Tuyến đường

$prevPath = '/PHP02/Day-4-04-19';
$response = [];
// - Method GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    switch ($_SERVER['REQUEST_URI']) {
        case $prevPath . '/':
            $response = route('GET', 'HomeController', 'index');
            break;
        case $prevPath . '/login':
            $response = route('GET', 'AuthController', 'login');
            break;
        case $prevPath . '/register':
            var_dump('register page');
        case $prevPath . '/products':
            var_dump('product page');
            break;
        default:
            # code...
            break;
    }
}

// - Method POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_SERVER['REQUEST_URI']) {
        case $prevPath . '/login':
            $response = route('POST', 'AuthController', 'loginSubmit');
            break;
        default:
            # code...
            break;
    }
}

function route($method, $controller, $action) {
    $object = new $controller();

    return $object->$action($method == 'POST' ? $_POST : $_GET);
}

if (isset($response['redirect'])) {
    header('Location: ' . $prevPath . $response['redirect']);
    // header('Location: http://localhost/PHP02/Day-4-04-19/');
}

include './Views/' . $response['view'] . '.php';

// Bài tập:
// In ra product list
// $product = [
//     [
//         'id' => 1,
//         'name' => 'Iphone 11',
//         'price' => 10000000,
//         'description' => 'Iphone 11 64GB',
//     ],
//     [
//         'id' => 2,
//         'name' => 'Iphone 12',
//         'price' => 12000000,
//         'description' => 'Iphone 12 64GB',
//     ],[
//         'id' => 3,
//         'name' => 'Iphone 13',
//         'price' => 13000000,
//         'description' => 'Iphone 13 64GB',
//     ],
//     [
//         'id' => 4,
//         'name' => 'Iphone 14',
//         'price' => 14000000,
//         'description' => 'Iphone 14 64GB',
//     ],
//     [
//         'id' => 5,
//         'name' => 'Iphone 15',
//         'price' => 15000000,
//         'description' => 'Iphone 15 64GB',
//     ],
// ]