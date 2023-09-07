FROM php:8.0-apache

WORKDIR "/var/www/html"

RUN a2enmod rewrite \
    && apt-get update && DEBIAN_FRONTEND=noninteractive apt-get install -qy \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd gettext mysqli pdo_mysql \
    # && pecl install xdebug && docker-php-ext-enable xdebug \
    && apt-get purge -y *-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

