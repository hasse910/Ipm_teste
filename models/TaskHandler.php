<?php
include '../config/database.php';

class TaskHandler {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAllTasks() {
        $stmt = $this->pdo->query("SELECT * FROM tasks");
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($tasks);
    }

    public function createTask($data) {
        $title = $data['title'];
        $description = $data['description'];
        $deadline = $data['deadline'];

        $stmt = $this->pdo->prepare("INSERT INTO tasks (TITULO, DESCRICAO, DATE) VALUES (?, ?, ?)");
        $stmt->execute([$title, $description, $deadline]);
        return json_encode(['message' => 'Tarefa criada com sucesso']);
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

    public function deleteTask($data) {
        $id = $data['id'];

        $stmt = $this->pdo->prepare("UPDATE tasks SET DELETED=1 WHERE ID=?");
        $stmt->execute([$id]);
        return json_encode(['message' => 'Tarefa deletada com sucesso']);
    }
}

?>
