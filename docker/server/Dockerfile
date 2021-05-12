FROM php:7.4-fpm

# Install PHP extensions and PECL modules.
RUN buildDeps=" \
      libpng-dev \
      libonig-dev \
      zlib1g-dev \
      libzip-dev \
    " \
    runtimeDeps=" \
      curl \
      git \
    " \
 && apt-get update \
 && DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends $buildDeps $runtimeDeps \
 && docker-php-ext-install bcmath mbstring mysqli opcache pdo_mysql zip \
 && apt-get clean \
 && rm -rf /var/lib/apt/lists/* \
 && apt update \
 && apt upgrade -y \
 && apt install vim -y\
 && apt install htop \
 && apt-get install -y procps

RUN apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# Install nodej
RUN apt-get install -y nodejs npm
RUN npm install -g bower

# Install git
RUN apt-get install -y git

#Install composer
RUN apt-get install curl
RUN curl -s https://getcomposer.org/installer | php -- --1
RUN mv composer.phar /usr/local/bin/composer

# Copy ini files.
COPY php.ini /usr/local/etc/php/

# Declare default environment variables.
ENV PHP_IDE_CONFIG 'serverName=localhost'

WORKDIR /var/www/app

CMD php-fpm
