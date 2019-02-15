# Sistema todo
Siga as Instruções para instalação e teste do sistema.

## Instruções
1. Após clonar o repositório do sistema execute o comando abaixo para instalar as dependências:
`composer install`
2. Construa o banco de com o nome applicationtodo abra o arquivo .env.example, na raiz da pasta do sistema
 e configure as opções de DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME e DB_PASSWORD conforme a configuração do servidor. Renomeie o arquivo .env.example para .env.
3. Apartir da pasta raiz do sistema execute o comando abaixo para criar as estruturas de banco dados para o funcionamento eficaz do sistema:
`php artisan migrate:fresh`
4. Apartir da pasta raiz do sistema execute o comando abaixo para testes automatizados da classe CreditCardTest,
 está classe não teve sua logica modificada. Apenas o arquivo das classes CreditCard e CreditCardTest foram modificados conforme solicitado:
`vendor/bin/phpunit`