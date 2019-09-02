FROM php:7.2-fpm

RUN apt-get update && apt-get install -y git libzip-dev unzip zip libxml2-dev build-essential libssl-dev zlib1g-dev libpng-dev libjpeg-dev libfreetype6-dev

RUN docker-php-ext-install zip xmlrpc xmlwriter gd

RUN curl -s https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
RUN echo "extension=xmlwriter.so" > /usr/local/etc/php/conf.d/docker-php-ext-xmlwriter.ini
