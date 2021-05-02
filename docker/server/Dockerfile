FROM php:7.2.26-fpm

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
 && rm -rf /var/lib/apt/lists/*

RUN apt-get update && \
apt-get install -y --no-install-recommends \
libjpeg-dev \
libfreetype6-dev
RUN docker-php-ext-install gd && \
docker-php-ext-configure gd \
--with-jpeg-dir=/usr/lib \
--with-freetype-dir=/usr/include/freetype2 && \
docker-php-ext-install gd exif

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
