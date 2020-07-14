# Prerequisites:
You must have Docker installed.

# Installation notes:
1. clone the project
2. copy the .env.example to .env and set the mysql credentials - DB_HOST=mysql
3. in the project folder run 'docker-compose up'.
Make sure that three containers are running - mysql, nginx and the app. If mysql is not running simply run:
'docker-compose start mysql'
4. run 'docker-compose exec app php artisan key:generate'
5. run 'docker-compose exec app php artisan migrate'

The app is now accessible on http://localhost:8080
