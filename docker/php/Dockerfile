FROM php:8.3-fpm

RUN apt-get update \
  && apt-get install -y zlib1g-dev vim libzip-dev \
  && docker-php-ext-install zip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm

WORKDIR /var/www/laravel-project

RUN composer global require "laravel/installer"

RUN docker-php-ext-install pdo_mysql

