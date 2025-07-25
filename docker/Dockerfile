# Etapa 1: imagem base com PHP e Composer
FROM php:8.2-cli

# Instala extensões necessárias
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev libpq-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath fileinfo

# Instala o Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Define diretório de trabalho
WORKDIR /var/www/src

# Copia os arquivos da aplicação
COPY ./src /var/www/src

# Instala dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

# Copia .env.example como .env se ainda não existir
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# Gera chave da aplicação
RUN php artisan key:generate

# Gera caches (não falha se der erro)
RUN php artisan config:cache || true
RUN php artisan route:cache || true
RUN php artisan view:cache || true

# Permissões
RUN chown -R www-data:www-data /var/www/src/storage /var/www/src/bootstrap/cache

# Exponha a porta padrão do Laravel
EXPOSE 8000

# Comando padrão: roda Laravel com servidor embutido
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]