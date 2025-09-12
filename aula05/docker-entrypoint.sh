#!/bin/bash
set -e

echo "=== Iniciando Dashboard de Clientes ==="

echo "Iniciando serviço MySQL..."
service mysql start

echo "Aguardando MySQL inicializar..."
while ! mysqladmin ping -h localhost --silent; do
    sleep 2
    echo "Aguardando MySQL..."
done
echo "MySQL iniciado com sucesso!"

echo "Configurando usuário e banco de dados..."
mysql -u root << EOF
CREATE USER IF NOT EXISTS 'leo'@'localhost' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON *.* TO 'leo'@'localhost' WITH GRANT OPTION;
CREATE USER IF NOT EXISTS 'leo'@'%' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON *.* TO 'leo'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;
EOF

if ! mysql -u leo -p123456 -e "USE dbaula05;" 2>/dev/null; then
    echo "Banco de dados 'dbaula05' não encontrado. Executando script SQL..."
    mysql -u leo -p123456 < /docker-entrypoint-initdb.d/banco_de_dados.sql
    echo "Banco de dados criado e populado com sucesso!"
else
    echo "Banco de dados 'dbaula05' já existe."
fi

echo "Configurando permissões dos arquivos..."
chown -R www-data:www-data /var/www/html
chmod -R 755 /var/www/html

echo "Habilitando módulos Apache..."
a2enmod rewrite
a2enmod expires
a2enmod deflate

echo "=== Iniciando Apache em primeiro plano ==="
echo "Dashboard de Clientes estará disponível em: http://localhost:8080"

exec "$@"