# Sistema de Produtos com Docker Compose

Aplicação web PHP com MySQL e phpMyAdmin rodando em containers Docker.

## Sobre o Projeto

Este projeto implementa um sistema simples de gerenciamento de produtos usando três serviços principais:

- Apache + PHP 8.1 para a aplicação web
- MySQL 8.0 para o banco de dados
- phpMyAdmin para gerenciamento visual do banco

Todos os serviços rodam em containers Docker separados e se comunicam através de uma rede privada.

## Estrutura do Projeto

```
projeto-docker/
├── docker-compose.yml      
├── Dockerfile             
├── init.sql              
├── README.md             
└── app/                  
    ├── index.php        
    ├── produtos.php     
    └── conexao.php      
```

## Pré-requisitos

Você precisa ter instalado em seu computador:

- Docker (versão 20.10 ou superior)
- Docker Compose (versão 3.8 ou superior)

Para verificar se já estão instalados:

```bash
docker --version
docker-compose --version
```

## Como Executar

Siga estes passos para iniciar o projeto:

1. Clone o repositório:
```bash
git clone seu-repositorio
cd projeto-docker
```

2. Inicie os containers:
```bash
docker-compose up -d
```

Aguarde alguns minutos enquanto as imagens são baixadas e os containers são criados.

3. Verifique se tudo está rodando:
```bash
docker-compose ps
```

Você deve ver três containers em execução: php_apache_container, mysql_container e phpmyadmin_container.

## Acessando as Aplicações

### Aplicação PHP Principal

Abra seu navegador e acesse:
```
http://localhost
```

Você verá a página inicial com a listagem de produtos e usuários cadastrados no banco de dados.

### Gerenciar Produtos

Para adicionar ou remover produtos, acesse:
```
http://localhost/produtos.php
```

### phpMyAdmin

Para acessar o gerenciador visual do banco de dados:
```
http://localhost:8080
```

Credenciais de acesso:
- Servidor: db
- Usuário: root
- Senha: root123

## Configuração do Banco de Dados

O banco de dados é criado automaticamente quando você inicia os containers pela primeira vez.

Informações de conexão:
- Host: db
- Porta: 3306
- Database: meu_banco
- Usuário: usuario
- Senha: senha123

### Tabelas Criadas

O script init.sql cria duas tabelas:

**Tabela produtos:**
- id
- nome
- descricao
- preco
- estoque
- data_cadastro

**Tabela usuarios:**
- id
- nome
- email
- senha
- data_cadastro

O banco já vem com alguns dados de exemplo: 5 produtos e 3 usuários.

## Comandos Úteis

### Parar os containers
```bash
docker-compose stop
```

### Iniciar os containers novamente
```bash
docker-compose start
```

### Ver os logs
```bash
docker-compose logs
```

Para acompanhar os logs em tempo real:
```bash
docker-compose logs -f
```

### Reiniciar os containers
```bash
docker-compose restart
```

### Parar e remover os containers
```bash
docker-compose down
```

Este comando mantém os dados do banco. Para remover tudo incluindo os dados:
```bash
docker-compose down -v
```

### Reconstruir após alterações no código
```bash
docker-compose up -d --build
```

## Persistência de Dados

Os dados do MySQL são armazenados em um volume Docker chamado mysql_data. Isso significa que seus dados permanecerão salvos mesmo se você parar ou remover os containers.

O diretório app/ é montado como volume, então você pode editar os arquivos PHP e ver as mudanças imediatamente, sem precisar reconstruir o container.

## Resolução de Problemas

### Os containers não iniciam

Verifique os logs para identificar o problema:
```bash
docker-compose logs
```

### Erro de porta já em uso

Se você receber um erro dizendo que a porta 80, 3306 ou 8080 já está em uso, você precisa parar o programa que está usando essas portas.

No Windows, para ver o que está usando a porta 80:
```bash
netstat -ano | findstr :80
```

### Erro de conexão com o banco

Certifique-se de que o container do MySQL está rodando:
```bash
docker-compose ps
```

Verifique os logs do MySQL:
```bash
docker-compose logs db
```

### Aplicação não carrega

Verifique os logs do Apache/PHP:
```bash
docker-compose logs app
```

## Tecnologias Utilizadas

- Docker e Docker Compose
- PHP 8.1
- Apache 2.4
- MySQL 8.0
- phpMyAdmin
- HTML5 e CSS3
- PDO (PHP Data Objects) para conexão com banco

## Observações de Segurança

Este projeto foi desenvolvido para fins educacionais. Se você for usar em produção, considere:

- Alterar todas as senhas padrão
- Usar variáveis de ambiente para informações sensíveis
- Configurar SSL/HTTPS
- Restringir acesso ao phpMyAdmin
- Fazer backups regulares do banco de dados
- Criar usuários MySQL com permissões limitadas

## Funcionalidades Implementadas

- Listagem de produtos com informações detalhadas
- Listagem de usuários cadastrados
- Cadastro de novos produtos
- Exclusão de produtos
- Interface web responsiva
- Conexão segura com MySQL usando PDO
- Gerenciamento visual do banco via phpMyAdmin
- Persistência automática dos dados
- Inicialização automática do banco de dados com dados de exemplo
