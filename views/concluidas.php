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
    <h1>Minhas Tarefas Concluidas</h1>
    <ul>
        <?php foreach ($tarefas as $tarefa) { ?>
            <li class="task">
                <span class="task-title"><?php echo $tarefa['TITULO']; ?></span>
            </li>
        <?php } ?>
    </ul>
    <a href="/" class="botao-redirecionar">Volta</a>
</div>
</body>
</html>

