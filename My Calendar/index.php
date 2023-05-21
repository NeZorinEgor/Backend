<?php

require_once 'config.php';
require_once 'controllers/TaskController.php';

$controller = new TaskController();


if (!empty($_GET['action'])) {
    $action = $_GET['action'];
    if (method_exists($controller, $action)) {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $controller->$action($id);
        } else {
            $controller->$action();
        }
    } else {
        echo 'Invalid action';
    }
} else {
    $controller->index();
}

