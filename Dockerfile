# Gunakan image PHP resmi
FROM php:8.2-fpm

# Install dependensi yang diperlukan
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-configure gd \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Salin semua file ke dalam container
COPY . .

# Install dependensi Laravel
RUN composer install --no-dev --optimize-autoloader

# Berikan izin yang diperlukan untuk Laravel
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Jalankan perintah default
CMD ["php-fpm"]