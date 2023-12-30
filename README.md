#### Copy .env.example and make .env and set mysql config according to mysql container

#### Run bellow command run bellow command to install dependency
`composer install`

#### Run bellow command
`docker-compose build --no-cache`

#### Run bellow command to run migration
`php artisan migrate`
