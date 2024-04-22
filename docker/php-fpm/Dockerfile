FROM php:8.2-fpm

RUN curl -sSL https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions -o - | sh -s \
      gd xdebug pdo pgsql pdo_pgsql apcu intl mongodb-stable opcache pcov

RUN wget https://getcomposer.org/installer -O - | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/

EXPOSE 9000

CMD ["php-fpm", "-F", "-R"]