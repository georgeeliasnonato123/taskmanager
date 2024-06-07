# Task Manager

Este é um sistema de gerenciamento de tarefas construído em Laravel. 

## Requisitos

- PHP 8.3 ou superior (recomendado PHP 8.3.7)
- Composer
- npm 8.5.1
- Node.js 12.22.9
- SQLite

## Instalação

## Disponibilizei o .env.examples e o vendor.examples, database.sqlite.examples para auxilio, caso o comando composer install não saia como o esperado.

Passo a passo para instalação

1. Clone este repositório para sua máquina local.
2. Navegue até a pasta task_manager.
3. Execute `composer install` para instalar as dependências do PHP. Certifique-se de que sua versão do PHP é compatível.
4. Execute `npm install` para instalar as dependências do Node.js.
5. Copie o arquivo `.env.example` para `.env` e defina o caminho absoluto do banco de dados SQLite em sua máquina.
6. Execute `php artisan migrate` para executar as migrações do banco de dados.
7. Execute `php artisan serve` para iniciar o servidor local.

Certifique-se de que todas as dependências estão instaladas corretamente e que você esteja usando a versão correta do PHP antes de executar os comandos mencionados acima.

## Comandos Adicionais que talvez pode precisar

para instalar o SQLite no projeto `sudo apt-get install php-sqlite3` 
para instalar o pacote xml no php.ini `sudo apt-get install php-xml` 
para instalar o pacote dom no php.ini `sudo apt-get install php-dom` 

## Contribuindo

Sinta-se à vontade para contribuir para este projeto. Basta abrir uma issue ou enviar uma pull request.



