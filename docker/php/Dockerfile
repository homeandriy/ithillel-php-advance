FROM ubuntu:20.04
LABEL authors="Andriy Beznosko"

    FROM php:8.1-apache

COPY ./app /var/www/html
WORKDIR /var/www/html


COPY ./docker/php/php.ini /usr/local/etc/php/php.ini

RUN set -x && \
  apt-get -y update && \
  apt-get install -y  \
        wget \
        libicu-dev \
        libbz2-dev \
        libcurl4-openssl-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        libicu-dev \
        libpq-dev \
        libxpm-dev \
        libvpx-dev \
        libzip-dev\
        libssl-dev\
        libonig-dev\
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install -j$(nproc) intl \
    && docker-php-ext-install -j$(nproc) pgsql \
    && docker-php-ext-install -j$(nproc) pdo_pgsql \
    && docker-php-ext-install -j$(nproc) mysqli \
    && docker-php-ext-install -j$(nproc) pdo \
    && docker-php-ext-install -j$(nproc) zip \
    && docker-php-ext-install -j$(nproc) pdo_mysql \
    && docker-php-ext-install -j$(nproc) gettext \
    && docker-php-ext-install -j$(nproc) exif

RUN a2enmod rewrite

COPY ./docker/apache2/000-default.conf /etc/apache2/sites-available/000-default.conf
# RUN ln -s /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-enabled/000-default.conf
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chmod -R 777 /var/www/html