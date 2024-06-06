Task Manager
Task Manager é uma aplicação web desenvolvida em Laravel para gerenciar tarefas.

Requisitos
Para rodar este projeto, você precisará das seguintes versões de software instaladas na sua máquina:

PHP: 8.3 ou superior (ideal PHP 8.3.7)
NPM: 8.5.1
Node.js: 12.22.9
SQLite
Instalação
Siga os passos abaixo para configurar e rodar o projeto na sua máquina local.

Passo 1: Clonar o repositório
Clone o repositório do GitHub e acesse o diretório do projeto:

bash
Copiar código
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
Passo 2: Instalar as dependências
Rode o comando abaixo para instalar as dependências do projeto:

bash
Copiar código
composer install
Se você estiver na versão correta do PHP, não deverá haver problemas.

Passo 3: Instalar dependências do Node.js
Rode o comando abaixo para instalar as dependências do Node.js:

bash
Copiar código
npm install
Passo 4: Configurar o arquivo .env
Defina o caminho absoluto do banco de dados SQLite na sua máquina no arquivo .env. Use o arquivo .env.example como base:

bash
Copiar código
cp .env.example .env
Abra o arquivo .env e configure o caminho absoluto para o seu banco de dados SQLite:

plaintext
Copiar código
DB_CONNECTION=sqlite
DB_DATABASE=/caminho/absoluto/para/seu/banco-de-dados.sqlite
Passo 5: Rodar as migrações
Execute as migrações para criar as tabelas no banco de dados:

bash
Copiar código
php artisan migrate
Passo 6: Rodar o servidor de desenvolvimento
Inicie o servidor de desenvolvimento:

bash
Copiar código
php artisan serve
A aplicação estará disponível no endereço http://127.0.0.1:8000.

Qualquer duvida ou problema, entre em contato com georgeelias6642@gmail.com

