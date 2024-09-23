# Docker Symfony

Lightweight dev environment for Symfony 7 with Docker.  
It provide :

- **Nginx** -  
- **PHP 8-fpm** -   
- **NodeJS** (latest) - _67.9MB_ 

It use Alpine container to reduce the weight

## Requirement

- Docker
- Docker-compose

## How to use

- Clone this repo at the racine of the Symfony's project
- Rename **.env.dist** to **.env**
- Update **.env** with your information (port, database....)..

- **_!! BE CARREFULL !!_** : Now, with **Symfony 4+**, the **.env** file is now committed !! you should either add **.env** to **.gitignore**  
  or rename this file and change is name inside the **env_file** variable of the **docker-compose.yml** file for each services  
  to avoid sensibles informations like password to be expose on your repository

- Inside **docker-compose.yml** Comment useless service or uncomment the one you need
- For the **build** container (nodejs), you must have a valid **package.json** file.  
  In docker-compose.yml **build** section , for **command**, replace the npm command with a command to build the assets (npm run dev, npm run prod, npm run watch...)
- Run `docker-compose up -d`
- Go to **"localhost:80"** in a web browser (replace the port with the nginx port you set)
- Enjoy
  

You must log into the php-container :

`docker exec -it php-container bash`

Inside the container, you can run :
`composer install` 
 
 wait...
## How to build front end 
You must log into the node-service :
 
and run the 3 commands

 `docker compose run --rm node-service npm install`
 `docker compose run --rm node-service npm run dev`
 `docker compose run --rm node-service npm run watch`