FROM php:8.0.16-fpm

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN apt-get update && apt-get install -y wget git unzip

RUN docker-php-ext-install pdo pdo_mysql
