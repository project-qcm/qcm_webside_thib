FROM php:8.0-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
# PHP extensions
RUN docker-php-ext-install pdo pdo_mysql
# INSTALL XDEBUG
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN apt-get update && apt-get upgrade -y