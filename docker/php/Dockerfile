FROM php:8.2-fpm

#Set working directory
WORKDIR /var/www

# set main params
ARG BUILD_ARGUMENT_ENV=dev
ENV ENV=$BUILD_ARGUMENT_ENV
ENV USERNAME=laravel

#Install dependencies
RUN apt-get clean && apt-get update && apt-get upgrade -y && apt-get install -y openssl zip unzip git \
#    build-essential \
#    libtool \
#    autoconf \
    libonig-dev \
    libfreetype6-dev \
    libjpeg-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
#    uuid-dev \
#    pkg-config \
#    apt-utils \
#    git \
    curl \
    libxml2-dev \
    libzip-dev \
    default-mysql-client

RUN docker-php-ext-configure gd --with-freetype --with-jpeg

RUN docker-php-ext-install -j$(nproc) gd

RUN docker-php-ext-install pdo mbstring bcmath gd pdo_mysql mysqli zip pcntl

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -d /home/${USERNAME} ${USERNAME}
RUN mkdir -p /home/${USERNAME}/.composer && \
    chown -R ${USERNAME}:${USERNAME} /home/${USERNAME}

# PHP Error Log Files
RUN mkdir /var/log/php
RUN mkdir /var/log/php/logs
RUN touch /var/log/php/errors.log && chmod 777 /var/log/php/errors.log
RUN chown -R ${USERNAME}:${USERNAME} /var/www

USER ${USERNAME}

# install Xdebug 3
USER root
RUN mkdir -p /tmp/
COPY ./do_we_need_xdebug.sh /tmp/
COPY ./xdebug.ini /tmp/xdebug.ini
USER root
RUN chmod u+x /tmp/do_we_need_xdebug.sh && /tmp/do_we_need_xdebug.sh
USER ${USERNAME}

# switch to root user
USER root

#Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY php.ini /usr/local/etc/php/php.ini

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www

# Install redis extension
RUN pecl install -o -f redis && rm -rf /tmp/pear && docker-php-ext-enable redis

# switch back to laravel user
USER ${USERNAME}
