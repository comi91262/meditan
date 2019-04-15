FROM php:7.3.4-fpm-alpine3.9

# 環境によって取得先をかえる
COPY meditan /var/www/meditan
COPY .env /var/www/meditan/.env

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/meditan

ENV COMPOSER_ALLOW_SUPERUSER 1
RUN composer install
RUN chmod -R a+w storage/ bootstrap/cache
