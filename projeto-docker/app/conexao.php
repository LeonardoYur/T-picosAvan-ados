<?php
$host = 'db'; // Nome do serviço no docker-compose
$dbname = 'meu_banco';
$username = 'usuario';
$password = 'senha123';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

function conectarMySQLi() {
    $host = 'db';
    $dbname = 'meu_banco';
    $username = 'usuario';
    $password = 'senha123';
    
    $conn = new mysqli($host, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }
    
    $conn->set_charset("utf8");
    return $conn;
}
?>