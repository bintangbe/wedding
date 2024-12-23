# Gunakan image resmi PHP dengan Apache
FROM php:8.1-apache

# Update sistem dan install ekstensi PHP yang diperlukan
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    && docker-php-ext-install mysqli pdo pdo_mysql

RUN apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Aktifkan modul Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Salin file proyek ke dalam container
COPY ./ /var/www/html/


# Berikan hak akses ke folder proyek
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Ekspos port untuk server web
EXPOSE 80

# Perintah default untuk menjalankan Apache di dalam container
CMD ["apache2-foreground"]
