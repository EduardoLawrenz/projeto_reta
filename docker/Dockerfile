FROM php:8.2-apache

# Instala dependências do sistema e extensões PHP
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev libpq-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath fileinfo

# Instala o Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Define o root do Apache para /public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# Corrige o DocumentRoot do Apache e ativa mod_rewrite e permissões
RUN sed -ri -e "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/000-default.conf \
    && echo "<Directory ${APACHE_DOCUMENT_ROOT}>\nOptions Indexes FollowSymLinks\nAllowOverride All\nRequire all granted\n</Directory>" > /etc/apache2/conf-available/laravel.conf \
    && a2enconf laravel \
    && a2enmod rewrite

# Copia os arquivos do projeto
COPY ./src /var/www/html

# Define o diretório de trabalho
WORKDIR /var/www/html

# Cria .env se não existir
RUN test -f .env || cp .env.example .env

# Instala dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

# Limpa caches antigos e gera nova chave/configs
RUN php artisan config:clear \
 && php artisan cache:clear \
 && php artisan route:clear \
 && php artisan view:clear \
 && php artisan key:generate \
 && php artisan config:cache \
 && php artisan route:cache \
 && php artisan view:cache || true

# Corrige permissões de pastas importantes
RUN chown -R www-data:www-data storage bootstrap/cache

# Expõe a porta padrão do Apache
EXPOSE 80

# Comando de inicialização
CMD ["apache2-foreground"]