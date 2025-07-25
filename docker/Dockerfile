# Etapa 1: imagem base com PHP e Composer
FROM php:8.2-fpm

# Instala extensões necessárias do PHP, incluindo ZIP e FILEINFO
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
RUN composer install --no-dev --optimize-autoloader

# Copia .env.example como .env se ainda não existir
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# Gera chave da aplicação
RUN php artisan key:generate

# Gera os caches, mas não falha se algum deles der erro
RUN php artisan config:cache || true
RUN php artisan route:cache || true
RUN php artisan view:cache || true

# Ajusta permissões
RUN chown -R www-data:www-data /var/www/src/storage /var/www/src/bootstrap/cache

# Expõe a porta padrão do PHP-FPM
EXPOSE 9000

# Comando padrão do container
CMD ["php-fpm"]