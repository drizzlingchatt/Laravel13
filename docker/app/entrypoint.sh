#!/usr/bin/env sh
set -eu

cd /var/www

if [ ! -f artisan ]; then
  composer create-project laravel/laravel:^13.0 . --prefer-dist --no-interaction
fi

if [ ! -f .env ] && [ -f .env.example ]; then
  cp .env.example .env
fi

if ! composer show laravel/ai >/dev/null 2>&1; then
  composer require laravel/ai --no-interaction
fi

if ! composer show mongodb/laravel-mongodb >/dev/null 2>&1; then
  composer require mongodb/laravel-mongodb --no-interaction
fi

if [ -f .env ] && ! grep -q '^APP_KEY=base64:' .env; then
  php artisan key:generate --force
fi

if [ -d storage ] && [ -d bootstrap/cache ]; then
  chown -R www-data:www-data storage bootstrap/cache
fi

exec "$@"
