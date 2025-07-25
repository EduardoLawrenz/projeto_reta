# Imagem base com PHP + Apache
FROM php:8.2-apache

# Instala extensões do PHP
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev libpq-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath fileinfo

# Instala o Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Ativa o módulo de reescrita do Apache
RUN a2enmod rewrite

# Define o diretório de trabalho do Apache
WORKDIR /var/www/html

# Copia os arquivos da aplicação (de src/) para o Apache
COPY ./src /var/www/html

# Corrige permissões
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Copia .env.example como .env se não existir
RUN [ -f .env ] || cp .env.example .env

# Instala dependências do Laravel e gera caches
RUN composer install --no-dev --optimize-autoloader \
    && php artisan key:generate \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Expõe a porta padrão HTTP
EXPOSE 80

# Inicia o Apache
CMD ["apache2-foreground"]