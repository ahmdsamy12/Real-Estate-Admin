FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    curl zip unzip git \
    libonig-dev libzip-dev libxml2-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# tokenizer, ctype, fileinfo are already built-in to php:8.3-cli — don't reinstall them
RUN docker-php-ext-install mbstring zip dom xml

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY composer.json ./
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install \
    --no-dev --optimize-autoloader --no-scripts --no-interaction --ignore-platform-reqs

COPY package.json package-lock.json* ./
RUN npm install

COPY . .
RUN npm run build

RUN mkdir -p \
    storage/framework/sessions \
    storage/framework/views \
    storage/framework/cache/data \
    bootstrap/cache \
    && chmod -R 777 storage bootstrap/cache

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}