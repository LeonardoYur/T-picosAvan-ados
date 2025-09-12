<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'dbaula05');
define('DB_USER', 'leo');
define('DB_PASS', '123456');
define('DB_CHARSET', 'utf8mb4');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Database {
    private $connection;
    
    public function __construct() {
        $this->connect();
    }
    
    private function connect() {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $this->connection = new PDO($dsn, DB_USER, DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erro de conexão com o banco de dados: " . $e->getMessage());
        }
    }
    
    public function getConnection() {
        return $this->connection;
    }
    
    public function query($sql, $params = []) {
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            die("Erro na consulta: " . $e->getMessage());
        }
    }
    
    public function fetchAll($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll();
    }
}

$database = new Database();

try {
    $clientes = $database->fetchAll("SELECT * FROM Clientes ORDER BY Nome");
} catch (Exception $e) {
    die("Erro ao buscar clientes: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        
        <main>
            <div class="stats">
                <div class="stat-card">
                    <h3>Total de Clientes</h3>
                    <p class="stat-number"><?= count($clientes) ?></p>
                </div>
            </div>
            
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Endereço</th>
                            <th>Cidade</th>
                            <th>Telefone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($clientes)): ?>
                            <?php foreach ($clientes as $cliente): ?>
                                <tr>
                                    <td><?= htmlspecialchars($cliente['Id_Cliente']) ?></td>
                                    <td><?= htmlspecialchars($cliente['Nome']) ?></td>
                                    <td><?= htmlspecialchars($cliente['Endereco'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($cliente['Cidade'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($cliente['Telefone'] ?? 'N/A') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="no-data">Nenhum cliente encontrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>