FROM php:7.3.4-fpm-alpine3.9

ENV COMPOSER_ALLOW_SUPERUSER 1

# 環境によって取得先をかえる
COPY meditan /var/www/meditan
WORKDIR /var/www/meditan
RUN chmod -R a+w storage/ bootstrap/cache

# Install Composer
RUN apk add composer
RUN composer install
RUN docker-php-ext-install pdo_mysql


COPY .env /var/www/meditan/.env
RUN php artisan migrate --seed


