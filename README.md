# Laravel 13 + AI SDK + MySQL + MongoDB + Redis + phpMyAdmin + Redis Insight (Docker)

This setup runs Laravel 13 with PHP-FPM + Nginx, plus MySQL, MongoDB, Redis, phpMyAdmin, and Redis Insight in Docker.

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
docker compose logs -f phpmyadmin
docker compose logs -f mongodb
docker compose logs -f redis
docker compose logs -f redisinsight
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

### Start all current services

```bash
docker compose up -d
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
| phpMyAdmin | http://localhost:8081 | user: `root` / pass: `root`     |
| MongoDB  | 127.0.0.1:27017       | user: `root` / pass: `root`       |
| Redis    | 127.0.0.1:6379        | —                                 |
| Redis Insight | http://localhost:5540 | connect to host `redis`, port `6379` |

---

## Demo pages

Available demo pages:

- `http://localhost:8080/` → redirects to `/demo`
- `http://localhost:8080/demo`
- `http://localhost:8080/demo/about`
- `http://localhost:8080/demo/services`
- `http://localhost:8080/demo/contact`
- `http://localhost:8080/demo/ai`

The AI demo page submits prompts to Gemini through the Laravel AI SDK.

### AI request logging

AI demo requests are stored in the SQL table `ai_requests`.

Recorded columns:

- `provider`
- `model`
- `prompt`
- `response`
- `status`
- `error_message`
- `ip_address`
- `user_agent`
- `created_at`
- `updated_at`

Use this command if you need to create the table in a fresh environment:

```bash
docker compose exec app php artisan migrate
```

The AI demo page also shows recent records from `ai_requests`.

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

### Local demo AI / GCP settings

Put real keys in `src/.env` on your own machine only. Do not commit them.

```env
GOOGLE_APPLICATION_CREDENTIALS=./tourrec-426301-e1d5e7eb8f14.json
MODE=local
GCP_PROJECT=tourrec-426301
PROJECT_ID=tourrec-426301
BUCKET_NAME=dm-fig-tw
GEMINI_API_KEY=your-gemini-api-key
API_KEY=your-app-api-key
```

### Gemini setup

Use Gemini locally by setting the API key in `src/.env`:

```env
GEMINI_API_KEY=your-gemini-api-key
```

If you are using Google Cloud services together with Gemini, also set:

```env
GOOGLE_APPLICATION_CREDENTIALS=./tourrec-426301-e1d5e7eb8f14.json
GCP_PROJECT=tourrec-426301
PROJECT_ID=tourrec-426301
BUCKET_NAME=dm-fig-tw
MODE=local
```

After changing env values, reload Laravel config:

```bash
docker compose exec app php artisan config:clear
docker compose exec app php artisan cache:clear
```

Keep the credentials JSON on your own machine only and never commit real keys to GitHub.
