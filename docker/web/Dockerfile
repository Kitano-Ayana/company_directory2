FROM php:8.1-apache

COPY *.conf /etc/apache2/sites-available/
COPY php.ini /usr/local/etc/php/
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN apt-get update \
  && apt-get install -y git zip unzip vim gcc pkg-config libmagickwand-dev libonig-dev libxml2-dev libzip-dev libpng-dev \
  && pecl install imagick \
  && docker-php-ext-enable imagick \
  && docker-php-ext-install bcmath pdo_mysql

RUN a2enmod rewrite

WORKDIR /var/www/html