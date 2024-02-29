#!/bin/bash
docker-php-entrypoint nginx

su - app
docker-php-entrypoint php-fpm
