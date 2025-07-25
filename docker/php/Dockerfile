FROM php:8.2-apache

# Instala dependências
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev libpq-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath fileinfo

# Instala Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Define root do Apache para public/
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# Altera configuração do Apache para apontar para /public
RUN sed -ri -e "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/000-default.conf \
    && echo "<Directory /var/www/html/public>\nOptions Indexes FollowSymLinks\nAllowOverride All\nRequire all granted\n</Directory>" > /etc/apache2/conf-available/laravel.conf \
    && a2enconf laravel \
    && a2enmod rewrite

# Copia o projeto Laravel
COPY ./src /var/www/html

# Define diretório de trabalho
WORKDIR /var/www/html

# Cria .env se não existir
RUN [ -f .env ] || cp .env.example .env

# Instala dependências Laravel
RUN composer install --no-dev --optimize-autoloader

# Gera chave e caches
RUN php artisan key:generate \
 && php artisan config:cache \
 && php artisan route:cache \
 && php artisan view:cache

# Permissões
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expõe porta padrão do Apache
EXPOSE 80

# Inicia Apache
CMD ["apache2-foreground"]