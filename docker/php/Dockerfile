# Imagem base com Apache e PHP 8.2
FROM php:8.2-apache

# Instalar dependências do sistema e extensões PHP necessárias
RUN apt-get update && apt-get install -y \
    git curl unzip zip libzip-dev libpng-dev libonig-dev libxml2-dev libssl-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd fileinfo

# Ativar mod_rewrite do Apache (necessário para Laravel)
RUN a2enmod rewrite

# Configurar Apache para apontar para /public (Laravel)
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf \
 && sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/c\<Directory /var/www/html/public>\n\tAllowOverride All\n\tRequire all granted\n</Directory>' /etc/apache2/apache2.conf

# Copiar o binário do Composer da imagem oficial para este container
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar arquivos do projeto para dentro do container
COPY src /var/www/html

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Criar .env se não existir (usando shell inline)
RUN test -f .env || cp .env.example .env

# Instalar dependências PHP do Laravel, otimizado para produção (sem dev)
RUN composer install --no-dev --optimize-autoloader

# Ajustar permissões das pastas de armazenamento e cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Limpar caches antigos e gerar nova chave/configurações otimizadas
RUN php artisan key:generate && \
    php artisan config:clear && php artisan cache:clear && php artisan route:clear && php artisan view:clear && \
    php artisan config:cache && php artisan route:cache && php artisan view:cache || true

# Expor a porta padrão do Apache
EXPOSE 80

# Comando para rodar o Apache em primeiro plano
CMD ["apache2-foreground"]