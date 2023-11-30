<?php
global $pdo;
include 'config/database.php';
include 'models/TaskHandler.php';

// Roteamento das requisições
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (empty($_GET)) {
        header('Location: views/main.php');
        exit;
    } elseif ($_GET['action'] === 'list_tasks') {
        $taskHandler = new TaskHandler($pdo);
        echo $taskHandler->getAllTasks();
    }
};
