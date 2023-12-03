FROM php:7.4-apache

RUN a2enmod rewrite
RUN docker-php-ext-install mysqli
RUN ln -sf /dev/stderr /var/log/apache2/php-error.log

WORKDIR /var/www/html

COPY . .
CMD apachectl -D FOREGROUND