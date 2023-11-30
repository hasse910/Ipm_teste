<?php
global $pdo;
include '../config/database.php';
include '../models/TaskHandler.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskHandler = new TaskHandler($pdo);
    $data = ['ID' => $_POST['ID']];

    echo ($taskHandler->apagarTask($data));
}