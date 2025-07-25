FROM php:8.2-apache

# Instala dependências do sistema e extensões do PHP
RUN apt-get update && apt-get install -y \
    git zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev libpq-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath fileinfo

# Ativa o mod_rewrite do Apache
RUN a2enmod rewrite

# Copia os arquivos do projeto para /var/www/html
COPY ./src /var/www/html

# Define o diretório de trabalho
WORKDIR /var/www/html

# Instala o Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Instala dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

# Copia .env.example como .env se não existir
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# Gera chave do Laravel
RUN php artisan key:generate

# Gera caches
RUN php artisan config:cache || true
RUN php artisan route:cache || true
RUN php artisan view:cache || true

# Define permissões para as pastas necessárias
RUN chown -R www-data:www-data storage bootstrap/cache

# Expõe a porta HTTP padrão (Render detecta)
EXPOSE 80

# Inicia o Apache
CMD ["apache2-foreground"]