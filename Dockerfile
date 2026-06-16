FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    curl zip unzip git nodejs npm \
    libzip-dev libcurl4-openssl-dev \
    && docker-php-ext-install \
    mbstring zip pdo fileinfo tokenizer dom xml ctype \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY composer.json ./
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install \
    --no-dev --optimize-autoloader --no-scripts --no-interaction --ignore-platform-reqs

COPY package.json ./
RUN npm install

COPY . .
RUN npm run build

RUN mkdir -p storage/framework/sessions storage/framework/views \
    storage/framework/cache/data bootstrap/cache \
    && chmod -R 777 storage bootstrap/cache

EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=$PORT
