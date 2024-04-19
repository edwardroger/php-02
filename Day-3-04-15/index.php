<?php

include('./IndexController.php');


$prevPath = '/PHP02/Day-4-04-19/';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    switch ($_SERVER['REQUEST_URI']) {
        case $prevPath . '':
            route('/', 'IndexController', 'index');
            break;
        
        default:
            # code...
            break;
    }
}

function route($path, $controller, $function) {
    $object = new $controller();

    $object->$function();
}