# Dashboard de Clientes - Aplicação PHP com MySQL em Docker

Esta aplicação web apresenta um sistema completo de dashboard para visualização de dados de clientes, utilizando PHP e MySQL integrados em um único contêiner Docker. O projeto foi desenvolvido para demonstrar como encapsular um ambiente completo de desenvolvimento (servidor web Apache, PHP e banco de dados MySQL) em uma solução containerizada, garantindo portabilidade e consistência entre diferentes ambientes.

## Instruções de Execução

Para executar esta aplicação, é necessário ter o [Docker](https://www.docker.com/get-started) previamente instalado e funcionando em seu sistema operacional.

1.  **Obter o Código Fonte:**
    ```bash
    git clone https://github.com/mbrito19/meu-dashboard-php-mysql-aula05.git
    cd meu-dashboard-php-mysql-aula05
    ```

2.  **Criar a Imagem Docker:**
    Utilize o comando abaixo para construir a imagem a partir do Dockerfile presente no repositório:
    ```bash
    docker build -t meu-dashboard-php-mysql .
    ```

3.  **Executar o Container:**
    Inicie o contêiner com mapeamento de portas e volume para persistência de dados:
    ```bash
    docker run -d --name meu-servidor-web -p 8080:80 -p 3306:3306 -v mysql_data:/var/lib/mysql meu-dashboard-php-mysql
    ```

4.  **Visualizar a Aplicação:**
    Navegue até o endereço abaixo em seu navegador para acessar o dashboard de clientes:
    ```
    http://localhost:8080
    ```

## Repositório na Nuvem

Esta imagem Docker encontra-se disponível publicamente no Docker Hub e pode ser acessada através do link:

[https://hub.docker.com/repository/docker/leonardoyur/meu-dashboard-php-mysql](https://hub.docker.com/repository/docker/leonardoyur/meu-dashboard-php-mysql)