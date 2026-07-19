# Laravel 13 + AI SDK + MySQL + MongoDB + Redis (Docker)

This setup runs Laravel 13 with PHP-FPM + Nginx, plus MySQL, MongoDB, and Redis in Docker.

---

## Docker Commands

### Start / Stop

```bash
# Build and start all services in background
docker compose up --build -d

# Start without rebuilding
docker compose up -d

# Stop all services
docker compose down

# Stop and remove volumes (wipes database data)
docker compose down -v
```

### Logs

```bash
# Tail all services
docker compose logs -f

# Tail a specific service
docker compose logs -f app
docker compose logs -f nginx
docker compose logs -f mysql
docker compose logs -f mongodb
docker compose logs -f redis
```

### Service status

```bash
docker compose ps
```

### Artisan

```bash
# Any artisan command
docker compose exec app php artisan

# Run migrations
docker compose exec app php artisan migrate

# Fresh migration + seed
docker compose exec app php artisan migrate:fresh --seed

# Open tinker REPL
docker compose exec app php artisan tinker
```

### Composer

```bash
# Install dependencies
docker compose run --rm --profile tools composer install

# Add a package
docker compose run --rm --profile tools composer require vendor/package

# Update all packages
docker compose run --rm --profile tools composer update
```

### Shell access

```bash
# App container shell
docker compose exec app bash

# MySQL shell
docker compose exec mysql mysql -u laravel -plaravel laravel

# Redis CLI
docker compose exec redis redis-cli

# MongoDB shell
docker compose exec mongodb mongosh -u root -p root
```

### Rebuild a single service

```bash
docker compose up --build -d app
```

---

## Git Commands

### Initial setup (first time)

```bash
git init -b main
git add .
git commit -m "Initial commit"
git remote add origin https://github.com/<username>/<repo>.git
git push -u origin main
```

### Daily workflow

```bash
# Check status and diff
git status
git diff

# Stage and commit
git add .
git commit -m "Your message"

# Push to GitHub
git push
```

### Branches

```bash
# Create and switch to a new branch
git checkout -b feature/my-feature

# Switch branch
git checkout main

# List branches
git branch -a

# Merge feature branch into main
git checkout main
git merge feature/my-feature

# Delete a branch
git branch -d feature/my-feature
git push origin --delete feature/my-feature
```

### Sync with remote

```bash
# Pull latest changes
git pull origin main

# Fetch without merging
git fetch origin
```

### Undo changes

```bash
# Discard unstaged changes to a file
git checkout -- src/routes/web.php

# Unstage a file
git reset HEAD src/routes/web.php

# Undo last commit (keep changes staged)
git reset --soft HEAD~1
```

### Tags

```bash
# Create a version tag
git tag v1.0.0
git push origin v1.0.0
```

---

## Service endpoints

| Service  | Host                  | Credentials                       |
|----------|-----------------------|-----------------------------------|
| App      | http://localhost:8080 | —                                 |
| MySQL    | 127.0.0.1:3306        | user: `laravel` / pass: `laravel` |
| MongoDB  | 127.0.0.1:27017       | user: `root` / pass: `root`       |
| Redis    | 127.0.0.1:6379        | —                                 |

---

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
