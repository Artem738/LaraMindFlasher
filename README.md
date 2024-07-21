docker exec -it mindflasher-php-1 /bin/bash
chmod -R 777 .  

php artisan test 


php artisan migrate:reset
php artisan migrate

php artisan db:seed
php artisan test 