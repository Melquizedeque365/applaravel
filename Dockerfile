# =========================
# Build frontend
# =========================
FROM node:22.23.4 AS frontend

WORKDIR /app

COPY package*.json ./

RUN npm install

COPY . .

RUN npm run build


# =========================
# PHP + Laravel
# =========================
FROM php:8.3.35-fpm

RUN apt-get update && apt-get install -y \
    nginx \
    git \
    curl \
    unzip \
    zip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    sqlite3 \
    libsqlite3-dev \
    && docker-php-ext-install \
    pdo \
    pdo_mysql \
    mbstring \  
    exif \
    pcntl \
    bcmath \
    gd \
    zip

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

# Copiar frontend buildado
COPY --from=frontend /app/public/build ./public/build

# Instalar dependências PHP
RUN composer install --no-dev --optimize-autoloader

RUN mkdir -p database \
    && touch database/database.sqlite \
    && chmod -R 777 database

# Permissões
RUN chown -R www-data:www-data storage bootstrap/cache

# Nginx
COPY docker/nginx/default.conf /etc/nginx/sites-available/default

# Start script
COPY docker/start.sh /start.sh

RUN chmod +x /start.sh

EXPOSE 10000

CMD ["/start.sh"]