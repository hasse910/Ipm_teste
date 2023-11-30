<?php
global $pdo;
include './../config/database.php';
include './../models/TaskHandler.php';
$taskHandler = new TaskHandler($pdo);
$tarefas = json_decode($taskHandler->getAllTasks(), true);
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
    <h1>Minhas Tarefas</h1>
    <ul>
        <?php foreach ($tarefas as $tarefa) { ?>
            <li class="task">
                <span class="task-title"><?php echo $tarefa['TITULO']; ?>   </span>
                <span class="task-title"> --- <?php echo $tarefa['DATE']; ?> </span>
                <div class="task-actions">
                    <form class="concluir-form" action="/controllers/ConcluirTask.php" method="POST">
                        <input type="hidden" name="ID" value="<?php echo $tarefa['ID']; ?>">
                        <button type="submit" class="btn-concluir">Concluir</button>
                    </form>

<!--                    <button class="btn-editar">Editar</button>-->

                    <form class="apagar-form" action="/controllers/ApagarTask.php" method="POST">
                        <input type="hidden" name="ID" value="<?php echo $tarefa['ID']; ?>">
                        <button type="submit" class="btn-apagar">Apagar</button>
                    </form>
                </div>
            </li>
        <?php } ?>
    </ul>
    <a href="./novaTask.php" class="btn-novo">Nova Task</a>
    <a href="./concluidas.php" class="botao-redirecionar">Concluidas</a>

</div>
</body>
</html>

