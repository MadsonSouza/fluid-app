#FluidAPP Web - Instalação

aplicações necessárias
- docker
- node.js
- composer

dentro da aplicação - executar via powershell, cmd ou algum bash do seu SO

executar docker compose para criar o ambiente com o comando: 
docker-compose up -d --build

criar o banco de dados e migrations: php artisan migrate

instalar dependencias do package.json: npm install


A aplicação roda em http://localhost no navegador
Fluid App é composto de: 
Laravel Framework
Modulos importados via node para backend e frontend
Front
- html
- bootstrap
- jquery
- ajax

Back
- PHP