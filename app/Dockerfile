# Dockerfile para la aplicación PHP
FROM php:7.4-apache

# Copiar los archivos de la aplicación al contenedor
COPY . /var/www/html/

# Instalar extensiones necesarias para PDO y MySQL
RUN docker-php-ext-install pdo pdo_mysql
