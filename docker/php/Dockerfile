FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libzip-dev \
    libonig-dev \
    unzip \
    zip \
    git \
    gcc \
    make \
    autoconf \
    pkg-config \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo_mysql zip mbstring

# Копируем рабочую директорию
WORKDIR /var/www/html

# Опционально, можно добавить установку Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Копировать все файлы проекта (если нужно)
 COPY . /var/www/html

# Права на папку storage и bootstrap/cache (если нужно)
 RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
