<?php
global $pdo;
include 'config/database.php';
include 'models/TaskHandler.php';

// Roteamento das requisições
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (empty($_GET)) {
        header('Location: views/main.php');
        exit;
    }elseif ($_GET['action'] === 'list_tasks') {
        $taskHandler = new TaskHandler($pdo);
        echo $taskHandler->getAllTasks();
    }

    // Aqui você pode adicionar mais rotas para outras ações GET, se necessário



} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['action'] === 'create_task') {
        $taskHandler = new TaskHandler($pdo);
        $data = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'deadline' => $_POST['deadline']
            // Outros campos necessários para criar a tarefa
        ];
        echo $taskHandler->createTask($data);
    }
    // Aqui você pode adicionar mais rotas para outras ações POST, se necessário
}
// Adicione condições para outros métodos HTTP conforme necessário (PUT, DELETE, etc.)
