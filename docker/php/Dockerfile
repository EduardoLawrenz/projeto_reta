FROM php:8.2-cli

# Instalar dependências
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libssl-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Abrir porta usada pelo Laravel
EXPOSE 8080

# Rodar Laravel via artisan serve
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]