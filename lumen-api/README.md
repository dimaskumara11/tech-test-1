composer install

php -r "echo 'base64:'.base64_encode(random_bytes(32)).PHP_EOL;" ( untuk generate key)
salin hasilnya dan set di .env (APP_KEY=base64:<key>)

konfigurasi DB di .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lumen_api
DB_USERNAME=root
DB_PASSWORD=password

php artisan jwt:secret

php artisan migrate --seed

php -S localhost:8000 -t public