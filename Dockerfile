FROM php:8.1-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli

# Включаем mod_rewrite
RUN a2enmod rewrite

# Копируем наш vhost конфиг
COPY ./apache.conf /etc/apache2/sites-available/000-default.conf