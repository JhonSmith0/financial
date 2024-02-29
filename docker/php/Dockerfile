
FROM composer:2.7 as composer

FROM php:8.3-fpm
WORKDIR /var/www/html

RUN groupadd -g 1000 app

RUN useradd -u 1000 -g 1000 -ms /bin/bash app
RUN useradd -ms /bin/bash nginx
RUN usermod -aG sudo app
RUN usermod -aG www-data app

RUN chown app /var/www/html

COPY --chown=app:www-data ./ ./
COPY --from=composer /usr/bin/composer /bin/composer

RUN apt-get update -y


COPY --chown=app:www-data ./docker/php/entrypoint.sh ./
RUN chmod +x ./entrypoint.sh

RUN apt-get install -y libzip-dev libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

RUN docker-php-ext-install sockets zip

RUN pecl install redis && docker-php-ext-enable redis

RUN apt-get install nginx sudo -y

COPY --chown=nginx:nginx ./docker/php/nginx/nginx.conf /etc/nginx/nginx.conf
COPY --chown=nginx:nginx ./docker/php/nginx/conf.d /etc/nginx/conf.d

USER app
RUN composer install --optimize-autoloader
USER root
ENTRYPOINT [ "./entrypoint.sh" ]
