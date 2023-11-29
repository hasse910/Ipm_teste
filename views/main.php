<?php
global $pdo;
include '../config/database.php';
include '../models/TaskHandler.php';
$taskHandler = new TaskHandler($pdo);
$tarefas = json_decode($taskHandler->getAllTasks(), true);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Minhas Tarefas</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
<div class="task-list">
    <h1>Minhas Tarefas</h1>
    <ul>
        <?php foreach ($tarefas as $tarefa) { ?>
            <li class="task">
                <span class="task-title"><?php echo $tarefa['TITULO']; ?></span>
                <div class="task-actions">
                    <button class="btn-concluir">Concluir</button>
                    <button class="btn-editar">Editar</button>
                    <button class="btn-apagar">Apagar</button>
                </div>
            </li>
        <?php } ?>
    </ul>
    <button class="btn-novo">Novo</button>
</div>
</body>
</html>

