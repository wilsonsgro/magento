FROM composer/composer:php7

RUN apt-get update && apt-get install  -y --no-install-recommends apt-utils && apt-get install -y \
        libicu-dev \
    && docker-php-ext-install \
        intl \
        opcache \
        bcmath \
        exif \
    && docker-php-ext-enable \
        intl \
        opcache \
        bcmath \
        exif

WORKDIR /var/www/outletdellalampada