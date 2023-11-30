<?php
include './../config/database.php';

class TaskHandler {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAllTasks() {
        $stmt = $this->pdo->query("SELECT * FROM tasks WHERE STATUS <> 1 AND DELETED <> 1");
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($tasks);
    }

    public function getCplTasks() {
        $stmt = $this->pdo->query("SELECT * FROM tasks WHERE STATUS = 1");
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($tasks);
    }

    public function createTask($data) {
        $title = $data['TASK'];
        $deadline = $data['DATE'];

        $stmt = $this->pdo->prepare("INSERT INTO tasks (TITULO, DATE) VALUES (?, ?)");
        $stmt->execute([$title, $deadline]);

        header('Location: /');
        exit;

//        return json_encode(['message' => 'Tarefa criada com sucesso']);
    }

    public function updateTask($data) {
        $id = $data['id'];
        $title = $data['title'];
        $description = $data['description'];
        $deadline = $data['deadline'];
        $status = $data['status'];

        $stmt = $this->pdo->prepare("UPDATE tasks SET TITULO=?, DESCRICAO=?, DATE=?, STATUS=? WHERE ID=?");
        $stmt->execute([$title, $description, $deadline, $status, $id]);
        return json_encode(['message' => 'Tarefa atualizada com sucesso']);
    }

    public function concludeTask($data) {
        $id = intval($data['ID']);

        $stmt = $this->pdo->prepare("UPDATE tasks SET STATUS=1 WHERE ID=? ;");
        $stmt->execute([$id]);

        header('Location: /');
        exit;

//        return json_encode(['message' => 'Tarefa concluida com sucesso']);
    }

    public function apagarTask($data) {
        $id = intval($data['ID']);

        $stmt = $this->pdo->prepare("UPDATE tasks SET DELETED=1 WHERE ID=?");
        $stmt->execute([$id]);

        header('Location: /');
        exit;

//        return json_encode(['message' => 'Tarefa deletada com sucesso']);
    }
}


