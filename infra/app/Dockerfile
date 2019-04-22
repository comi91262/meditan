FROM php:7.3.4-fpm-alpine3.9

ENV COMPOSER_ALLOW_SUPERUSER 1

# 環境によって取得先をかえる
COPY meditan /var/www/meditan
WORKDIR /var/www/meditan
RUN chmod -R a+w storage/ bootstrap/cache

# Install Composer
RUN apk add composer
RUN composer install --optimize-autoloader --no-dev
RUN docker-php-ext-install pdo_mysql


COPY .env /var/www/meditan/.env

RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan passport:keys

# RUN /usr/sbin/mysql -u laravel -p secret
# RUN php artisan migrate:fresh --seed


