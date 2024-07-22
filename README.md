docker exec -it mindflasher-php-1 /bin/bash
chmod -R 777 .  

php artisan test 


php artisan migrate:reset
php artisan migrate

php artisan db:seed
php artisan test 




curl -X POST "http://176.37.2.137/api/flashcards/2/progress/weight" \
     -H "Authorization: Bearer 14|K7UKIINAt7k39sL4323sOnmRqrQnCzyERYzs6Z4yba725228" \
     -H "Content-Type: application/json" \
     -d '{"weight": 5}'