#!/bin/sh

set -eu

cd /var/www

if [ ! -f .env ]; then
  cp .env.example .env
fi

if ! grep -q '^APP_KEY=base64:' .env; then
  php artisan key:generate --force
fi

php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"

chmod -R 775 storage bootstrap/cache || true

php artisan migrate --force

exec php artisan serve --host=0.0.0.0 --port=8000
