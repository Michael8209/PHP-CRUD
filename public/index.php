<?php
// Front controller: kiest de controller-actie op basis van ?action=
session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/controllers/VoorraadController.php';

$controller = new VoorraadController(getPdo());
$action = $_GET['action'] ?? 'index';
$method = $_SERVER['REQUEST_METHOD'];

match (true) {
    $action === 'create'                  => $controller->create(),
    $action === 'store' && $method === 'POST' => $controller->store(),
    default                               => $controller->index(),
};
