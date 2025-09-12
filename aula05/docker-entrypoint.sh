#!/bin/bash

# Inicia o serviço do MySQL em segundo plano
mysqld_safe --skip-grant-tables &

# Espera o MySQL iniciar completamente
echo "Aguardando o MySQL iniciar..."
while ! mysqladmin ping -h localhost --silent; do
    sleep 1
done
echo "MySQL iniciado."

# Define a senha para o usuário 'root'
mysql -u root -e "ALTER USER 'leo'@'localhost' IDENTIFIED WITH mysql_native_password BY '123456'; FLUSH PRIVILEGES;"

# Verifica se o banco de dados 'britinho' já existe.
if ! mysql -u root -p'123456' -e "USE dbaula05" 2>/dev/null; then
    echo "Banco de dados 'dbaula05' não encontrado. Executando script SQL..."
    # Adicione a flag --default-character-set=utf8mb4 aqui
    mysql -u root -p'123456' --default-character-set=utf8mb4 < /docker-entrypoint-initdb.d/banco_de_dados.sql
else
    echo "Banco de dados 'dbaula05' já existe. Pulando a execução do script SQL."
fi

# Inicia o Apache em primeiro plano, mantendo o contêiner ativo
exec "$@"
