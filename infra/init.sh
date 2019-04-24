# !/bin/sh

docker-compose up -d --build
sleep 3
docker container exec -it app php artisan migrate:fresh --seed
