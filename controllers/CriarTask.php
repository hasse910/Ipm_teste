<?php
global $pdo;
include '../config/database.php';
include '../models/TaskHandler.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskHandler = new TaskHandler($pdo);
    $data = [
        'TASK' => $_POST['TASK'],
        'DATE' => $_POST['DATE']
    ];

    echo ($taskHandler->createTask($data));
}