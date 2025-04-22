# Fornost API

![PHP](https://img.shields.io/badge/php-8.x-blue)
![License](https://img.shields.io/badge/license-MIT-green)
![Composer](https://img.shields.io/badge/dependencies-managed%20by-composer-yellow)

Fornost é uma API RESTful em PHP, utilizando PDO para interação com o banco de dados e oferecendo operações CRUD (Create, Read, Update, Delete) para gerenciar usuários. A autenticação é feita via API Key.

---

## 🔧 Requisitos

- PHP 8.0 ou superior
- Composer
- Opcional: `make` (para facilitar a instalação e execução)

---

##  Instalação

### 1. Clone o repositório

```bash
git clone https://github.com/seu-usuario/fornost-api.git
cd fornost-api
```

### 2. Instale as dependências


```bash
make install  
make run      
```

Se o make não estiver instalado, usar o script alternativo para instalar as dependências e rodar o servidor:


```bash
sh instalacao.sh
```

### Estrutura do Projeto


Fornost/
├── public/
│   └── index.php            # Ponto de entrada da API
│
├── config/
│   └── config.php           # Configurações e variáveis de ambiente
│
├── src/
│   ├── Controllers/         # Controladores HTTP (UserController, etc.)
│   ├── Models/              # Models de operações CRUD (UserCreate, UserRead, etc.)
│   └── Database/            # Conexão PDO (Database.php)
│
├── bin/
│   └── alternativo.sh       # Script alternativo de inicialização
│
├── .env                     # Variáveis de ambiente (não commitadas)
├── Makefile                 # Makefile para facilitar a instalação e execução
├── instalacao.sh            # Script de fallback para instalação e execução
├── composer.json            # Arquivo de dependências e autoload
└── vendor/                  # Diretório gerado pelo Composer

### Fluxo de Execução

O ponto de entrada é o arquivo `public/index.php` . 

O arquivo `index.php` carrega o autoloader do Composer (`vendor/autoload.php`) e as configurações de banco de dados a partir do arquivo `config/config.php`.

A API verifica a chave de API enviada pelo cliente (via cabeçalho `X-API-KEY` ou `api_key` na query string).

A rota da requisição é identificada usando `parse_url($_SERVER['REQUEST_URI'])`.

Dependendo da rota, o controlador apropriado é invocado, como `UserController` para rotas relacionadas aos usuários.

O controlador manipula a requisição e chama o modelo adequado para realizar a operação no banco de dados (CRUD).

A resposta é gerada e enviada ao cliente em formato JSON.

### Exemplo de Arquivo `.env`

O arquivo `.env` contém configurações sensíveis e variáveis de ambiente:
```
DB_HOST=localhost
DB_NAME=fornost
DB_USER=root
DB_PASS=secret

API_KEY=123456
```
