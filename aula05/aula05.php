<?php
$server   = "SERVIDOR.database.windows.net";
$database = "dbaula03";
$username = "leo";
$password = "123456";

try {
    $conn = new PDO("sqlsrv:server=$server;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = $conn->query("SELECT * FROM Clientes");
    $clientes = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <style>
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #444;
            text-align: left;
        }
        tr:nth-child(even) { background-color: #f2f2f2; }
        tr:nth-child(odd)  { background-color: #e6f7ff; }
        th { background-color: #005f99; color: white; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Lista de Clientes</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Cidade</th>
            <th>Telefone</th>
        </tr>
        <?php foreach ($clientes as $c): ?>
            <tr>
                <td><?= $c['Id_Cliente'] ?></td>
                <td><?= $c['Nome'] ?></td>
                <td><?= $c['Endereco'] ?></td>
                <td><?= $c['Cidade'] ?></td>
                <td><?= $c['Telefone'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
