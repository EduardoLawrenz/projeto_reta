# Etapa 1: imagem base com PHP e Composer
FROM php:8.2-fpm

# Instala extensões necessárias do PHP, incluindo FILEINFO
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev libpq-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath fileinfo

# Instala o Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Define diretório de trabalho
WORKDIR /var/www/src

# Copia os arquivos da aplicação para dentro do container
COPY ./src /var/www/src

# Instala as dependências do Laravel
RUN composer install --no-dev --optimize-autoloader \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Permissões
RUN chown -R www-data:www-data /var/www/src/storage /var/www/src/bootstrap/cache

# Exposição da porta padrão do PHP-FPM
EXPOSE 9000

# Comando padrão para rodar o container
CMD ["php-fpm"]