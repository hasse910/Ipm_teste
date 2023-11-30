<?php
global $pdo;
include '../config/database.php';
include '../models/TaskHandler.php';
$taskHandler = new TaskHandler($pdo);
$tarefas = json_decode($taskHandler->getCplTasks(), true);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Minhas Tarefas</title>
    <link rel="stylesheet" href="../public/css/styles.css">
    <link rel="icon" type="image/png" href="/public/favicon.png">
</head>
<body>
<div class="task-list">
    <h1>Nova Tarefa</h1>
    <form class="task-actions" action="/controllers/CriarTask.php" method="POST">
        <input type="text" id="TASK" name="TASK" placeholder="Digite a tarefa a realizar" required>

        <input type="date" id="DATE" name="DATE" required>
        <input class="btn-novo" type="submit" value="Nova Tarefa">
    </form>
</div>
</body>
</html>
