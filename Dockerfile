FROM php:8.2-cli

WORKDIR /var/www

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git \
        pkg-config \
        libsqlite3-dev \
        unzip \
        libzip-dev \
    && docker-php-ext-install pdo_sqlite zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1

COPY . .

RUN composer install --no-interaction --prefer-dist

RUN php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"

EXPOSE 8000

CMD ["sh", "docker/entrypoint.sh"]
