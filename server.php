<?php

if (file_exists('database.json')) {
    $string = file_get_contents('database.json');
    $todoList = json_decode($string, true);
} else {
    $todoList = [
        [
            'text' => 'Fare da mangiare',
            'done' => false
        ],
        [
            'text' => 'Ripulire in casa',
            'done' => true
        ],
        [
            'text' => 'Andare a prendere il bimbo al nido',
            'done' => true
        ]
    ];
}



if (isset($_POST['newTodo'])) {
    $todoList[] = [
        'text' => $_POST['newTodo']['text'],
        'done' => $_POST['newTodo']['done'] === "true"?true:false
    ];

    file_put_contents('database.json', json_encode($todoList));

} else if (isset($_POST['setTodoDone'])) {

    $index = $_POST['setTodoDone'];
    $todoList[$index]['done'] = true;
    file_put_contents('database.json', json_encode($todoList));

} else if (isset($_POST['toggleTodoDone'])) {

    $index = $_POST['toggleTodoDone'];
    $todoList[$index]['done'] = !$todoList[$index]['done'];
    file_put_contents('database.json', json_encode($todoList));

} else if (isset($_POST['deletedTodo'])) {

    $index = $_POST['deletedTodo'];
    array_splice($todoList, $index, 1);
    file_put_contents('database.json', json_encode($todoList));

}


header('Content-Type: application/json');
echo json_encode($todoList);
