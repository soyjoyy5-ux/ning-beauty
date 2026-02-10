FROM richarvey/nginx-php-fpm:latest

COPY . /var/www/html

RUN composer install --no-dev --optimize-autoloader

ENV WEBROOT=/var/www/html/public
