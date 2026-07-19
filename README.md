# Laravel 13 + AI SDK + MySQL + MongoDB + Redis (Docker)

This setup runs Laravel 13 with PHP-FPM + Nginx, plus MySQL, MongoDB, and Redis in Docker.

## Start

```bash
docker compose up --build -d
```

On first start, the `app` container automatically:
1. Creates a new Laravel 13 project inside `./src` (if missing)
2. Installs `laravel/ai`
3. Installs `mongodb/laravel-mongodb`

App URL: `http://localhost:8080`

## Useful commands

Run Artisan:

```bash
docker compose exec app php artisan
```

Run migrations:

```bash
docker compose exec app php artisan migrate
```

Run Composer via tools profile:

```bash
docker compose run --rm --profile tools composer install
```

## Service endpoints

- MySQL: `127.0.0.1:3306` (`laravel` / `laravel`, root password `root`)
- MongoDB: `127.0.0.1:27017` (root user `root`, password `root`)
- Redis: `127.0.0.1:6379`

## Laravel environment notes

After first boot, update `src/.env` as needed. Defaults expected by this compose file:

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=laravel

REDIS_HOST=redis
REDIS_PORT=6379

MONGODB_URI=mongodb://root:root@mongodb:27017
```
