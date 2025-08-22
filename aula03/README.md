

## Passo 1 - Criar o banco de dados na Azure
1. Acesse o portal [Azure].
2. Crie um recurso **SQL Database**.
3. Configure o **SQL Server** (usuário e senha).
4. No firewall do servidor, permita conexões **da sua máquina local**.
5. Copie a **string de conexão** fornecida pela Azure.

## Passo 2 - Executar o script SQL
1. Abra o **SQL Server Management Studio (SSMS)**.
2. Execute o arquivo `script.sql` para criar a tabela `Clientes` e inserir dados de teste.

## Passo 3 - Configurar o PHP no XAMPP
1. Instale o [XAMPP].
2. Ative o **Apache**.
3. Copie os arquivos do projeto para a pasta `htdocs` do XAMPP

## Passo 4 - Rodar a Aplicação
1. No navegador, acesse: http://localhost/index.php
2. A tabela com os clientes será exibida.

