#!/bin/bash
# Instala as dependências se necessário
composer install
# Inicia o servidor embutido do PHP na porta 8000, servindo os arquivos da pasta public/
php -S localhost:8000 -t public
