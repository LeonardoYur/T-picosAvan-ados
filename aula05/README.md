Este projeto demonstra a criação de uma aplicação web completa em um único contêiner Docker, desenvolvida em PHP, que exibe uma lista de clientes de um banco de dados MySQL rodando no mesmo contêiner.

## Como Executar o Contêiner

Para rodar este projeto, você precisa ter o [Docker](https://www.docker.com/get-started) instalado em sua máquina.

1. **Clone o Repositório:**
   ```bash
   git clone https://github.com/leonardoyur/meu-dashboard-php-mysql-aula05.git
   cd meu-dashboard-php-mysql-aula05
   ```

2. **Construir a Imagem:**
   ```bash
   docker build -t meu-dashboard-php-mysql .
   ```

3. **Rodar o Contêiner:**
   ```bash
   docker run -d --name meu-servidor-web -p 8080:80 -p 3306:3306 -v mysql_data:/var/lib/mysql meu-dashboard-php-mysql
   ```

4. **Acessar a Aplicação:**
   ```
   http://localhost:8080
   ```

## Repositório Docker Hub

https://hub.docker.com/repository/docker/leonardoyur/meu-dashboard-php-mysql
