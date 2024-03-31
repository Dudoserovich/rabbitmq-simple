FROM ghcr.io/devgine/composer-php:latest

ARG ENV=dev
ARG DEBUG=true

RUN chmod -R 777 /var/cache
RUN install-php-extensions sockets

WORKDIR /var/www

COPY ./ /var/www
RUN composer install -d /var/www
