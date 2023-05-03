FROM ubuntu:20.04
LABEL authors="Andriy Beznosko"

FROM php:8.1-apache

COPY ./app /var/www/html
WORKDIR /var/www/html

RUN set -x && \
  apt-get -y update && \
  apt-get install -y  \
    wget \
    libicu-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    libicu-dev \
    libpq-dev \
    libxpm-dev \
    libvpx-dev \
    libzip-dev\
  && docker-php-ext-install -j$(nproc) gd \
  && docker-php-ext-install -j$(nproc) intl \
  && docker-php-ext-install -j$(nproc) pgsql \
  && docker-php-ext-install -j$(nproc) pdo_pgsql \
  && docker-php-ext-install -j$(nproc) exif

RUN a2enmod rewrite &&  \
    mkdir /composer-setup &&  \
    wget https://getcomposer.org/installer -P /composer-setup &&  \
    php /composer-setup/installer --install-dir=/usr/bin &&  \
    rm -Rf /composer-setup
#COPY ./../apache2/000-default.conf /etc/apache2/sites-available/000-default.conf
# RUN ln -s /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-enabled/000-default.conf
RUN mkdir /composer-setup &&  \
    wget https://getcomposer.org/installer -P /composer-setup &&  \
    php /composer-setup/installer --install-dir=/usr/bin  \
    && rm -Rf /composer-setup

RUN chmod -R 777 /var/www/html