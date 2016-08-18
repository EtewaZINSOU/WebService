<?php
require_once '../vendor/autoload.php';
use Etewa\Model\SportModel;

header("Content-type:application/json");

$response ='';

$method = $_SERVER['REQUEST_METHOD'];

$url = $_GET['url'];

$sport = new SportModel();

$uri = $_SERVER['REQUEST_URI'];

switch (true) {
    case $method == 'GET' && $url == '/sports':
        $response = json_encode($sport->findAll());
        break;

    case $method == 'GET' && preg_match('#^/sports/(\d+)$#', $url, $value):
        array_shift($value);
        list($id) = $value;
        $response = json_encode($sport->findById($id));
        break;

    case $method == 'POST' && $url == '/sports':
        $input_value = json_decode(file_get_contents('php://input'), true);
        $sport->add($input_value['name']);
        $response = $sport->getNewSport($input_value['name']);
        break;

    case $method == 'PUT' && preg_match('#^/sports/(\d+)$#', $url, $value):
        array_shift($value);
        list($id) = $value;
        $input_value = json_decode(file_get_contents('php://input'), true);
        $sport->add($input_value['name']);
        $response = $sport->getNewSport($input_value['name']);
        break;

    default:
        $response = 'Unable to display data';
        $exit = true;
        break;
}

die($response);









