# Fornost API

![PHP](https://img.shields.io/badge/php-8.x-blue)
![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)


Fornost, API para PoselTecno  a ser usada pela iniciativa PACU. Acesso a Banco de dados MYSQL usando api key para autenticação

---

## Requisitos

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
### Estrutura do Projeto

<pre>
Fornost/
├── public/
│   └── index.php            
│
├── config/
│   └── config.php          
│
├── src/
│   ├── Controllers/         
│   ├── Models/              
│   └── Database/            
│
├── bin/
│   └── alternativo.sh       
│
├── .env                     
├── Makefile                 
├── instalacao.sh            
├── composer.json            
└── vendor/                  
<pre>
</div>