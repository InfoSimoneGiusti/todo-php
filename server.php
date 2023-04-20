<?php

$todoList = [
    'Fare da mangiare',
    'Ripulire in casa',
    'Andare a prendere il bimbo al nido'
];

if (isset($_POST['ciccio'])) {
    $todoList[] = $_POST['ciccio'];
}

header('Content-Type: application/json');
echo json_encode($todoList);
