<?php
require_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Produtos - Docker Compose</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        
        header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        
        header p {
            font-size: 1.1em;
            opacity: 0.9;
        }
        
        .content {
            padding: 30px;
        }
        
        .section {
            margin-bottom: 40px;
        }
        
        .section h2 {
            color: #667eea;
            margin-bottom: 20px;
            font-size: 1.8em;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }
        
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
        }
        
        tr:hover {
            background: #f8f9ff;
        }
        
        .status {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: 600;
        }
        
        .status.disponivel {
            background: #d4edda;
            color: #155724;
        }
        
        .status.baixo {
            background: #fff3cd;
            color: #856404;
        }
        
        .status.esgotado {
            background: #f8d7da;
            color: #721c24;
        }
        
        .info-box {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .info-box h3 {
            margin-bottom: 10px;
        }
        
        .links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 25px;
            background: white;
            color: #667eea;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>🐳 Sistema de Produtos</h1>
            <p>Aplicação PHP com MySQL rodando em Docker Compose</p>
        </header>
        
        <div class="content">
            <div class="info-box">
                <h3>✅ Conexão com MySQL estabelecida com sucesso!</h3>
                <p>Aplicação rodando em containers Docker gerenciados pelo Docker Compose</p>
                <div class="links">
                    <a href="http://localhost:8080" target="_blank" class="btn">📊 Abrir phpMyAdmin</a>
                    <a href="produtos.php" class="btn">➕ Gerenciar Produtos</a>
                </div>
            </div>
            
            <div class="section">
                <h2>📦 Produtos Cadastrados</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Estoque</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        try {
                            $stmt = $pdo->query("SELECT * FROM produtos ORDER BY id");
                            
                            while ($produto = $stmt->fetch()) {
                                $status = 'disponivel';
                                $statusTexto = 'Disponível';
                                
                                if ($produto['estoque'] == 0) {
                                    $status = 'esgotado';
                                    $statusTexto = 'Esgotado';
                                } elseif ($produto['estoque'] <= 10) {
                                    $status = 'baixo';
                                    $statusTexto = 'Estoque Baixo';
                                }
                                
                                echo "<tr>";
                                echo "<td>{$produto['id']}</td>";
                                echo "<td><strong>{$produto['nome']}</strong></td>";
                                echo "<td>{$produto['descricao']}</td>";
                                echo "<td>R$ " . number_format($produto['preco'], 2, ',', '.') . "</td>";
                                echo "<td>{$produto['estoque']} un.</td>";
                                echo "<td><span class='status {$status}'>{$statusTexto}</span></td>";
                                echo "</tr>";
                            }
                        } catch (PDOException $e) {
                            echo "<tr><td colspan='6'>Erro ao buscar produtos: " . $e->getMessage() . "</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            
            <div class="section">
                <h2>Usuários Cadastrados</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Data de Cadastro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        try {
                            $stmt = $pdo->query("SELECT id, nome, email, data_cadastro FROM usuarios ORDER BY id");
                            
                            while ($usuario = $stmt->fetch()) {
                                $data = date('d/m/Y H:i', strtotime($usuario['data_cadastro']));
                                
                                echo "<tr>";
                                echo "<td>{$usuario['id']}</td>";
                                echo "<td><strong>{$usuario['nome']}</strong></td>";
                                echo "<td>{$usuario['email']}</td>";
                                echo "<td>{$data}</td>";
                                echo "</tr>";
                            }
                        } catch (PDOException $e) {
                            echo "<tr><td colspan='4'>Erro ao buscar usuários: " . $e->getMessage() . "</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>