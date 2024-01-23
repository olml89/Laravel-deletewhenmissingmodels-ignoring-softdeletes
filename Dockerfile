# Pull php-fpm image
FROM php:8.2-cli

# Install php extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install and run composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set default work directory
WORKDIR /var/www
