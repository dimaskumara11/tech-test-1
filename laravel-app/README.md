composer install

konfigurasi DB di .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_app
DB_USERNAME=root
DB_PASSWORD=password

php artisan key:generate

php artisan migrate --seed

php artisan storage:link

php artisan serve