# Utiliza la imagen oficial de PHP con Apache para Laravel
FROM php:7.4-apache

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Instala dependencias necesarias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-install zip

# Habilita mod_rewrite de Apache
RUN a2enmod rewrite

# Copia los archivos de la aplicación al contenedor
COPY . /var/www/html

# Cambia la raíz del documento al directorio 'public'
RUN sed -i -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instala las dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Asigna permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expone el puerto 80 para Apache
EXPOSE 80

# Ejecuta Apache en primer plano
CMD ["apache2-foreground"]
