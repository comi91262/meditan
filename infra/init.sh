# !/bin/sh

docker-compose up -d --build
docker container exec -it app php artisan migrate:fresh --seed
