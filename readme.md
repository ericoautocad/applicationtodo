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
4. Os endpoints para testar o sistema são:

 GET `http://your_host_or_ip_system/api/todos`

 Lista todos cadastradas

 GET `http://your_host_or_ip_system/api/todos?order=uuid,desc`

 Lista todos cadastradas ordenadas por campo

 GET `http://your_host_or_ip_system/api/todos/:uuid`

 Ver detalhes de uma todo.

 POST `http://your_host_or_ip_system/api/todos`

 ```js
 //payload request:
 {"content": "todo 20", "type": "shopping", "sort_order": 0, "done": 0}
 //or
 {"content": "todo 20", "type": "work", "sort_order": 1, "done": 1}

 ```

 Definir novas todo

 PUT `http://your_host_or_ip_system/api/todos/:uuid`

 ```js
 //payload request:
 {"content": "todo 20", "type": "shopping", "sort_order": 0, "done": 0}
 //or
 {"content": "todo 20", "type": "work", "sort_order": 1, "done": 1}

 ```

 Atualizar todo cadastrada

 DELETE `http://your_host_or_ip_system/api/todos/:uuid`

 Remove todo cadastrada
 