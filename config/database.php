<?php
$host = '192.185.209.245';
$dbname = 'realme22_ipm';
$username = 'realme22_ipm';
$password = 'G9t@CX!*';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
