<?php

if (file_exists('database.json')) {
    $string = file_get_contents('database.json');
    $todoList = json_decode($string, true);
} else {
    $todoList = [];
}


if (isset($_POST['ciccio'])) {

    if (strlen($_POST['ciccio']) < 3) {
        header('HTTP/1.1 400 Bad Request');
        http_response_code(400);
        echo "Lunghezza minima della todo di 3 caratteri!";
        die();
    }

    $todoList[] = $_POST['ciccio'];

    $myString = json_encode($todoList);
    file_put_contents('database.json', $myString);

}

header('Content-Type: application/json');
echo json_encode($todoList);
