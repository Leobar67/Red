# Usa una imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instala extensiones necesarias para MySQL (pdo_mysql)
RUN apt-get update && apt-get install -y \
    libzip-dev unzip libpng-dev libonig-dev libxml2-dev libcurl4-openssl-dev \
    && docker-php-ext-install pdo pdo_mysql

# Copia tus archivos del proyecto al directorio raíz del servidor
COPY . /var/www/html/

# Da permisos (opcional, pero útil en desarrollo)
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/

# Habilita mod_rewrite si lo necesitas
RUN a2enmod rewrite

# Expone el puerto 80
EXPOSE 80
