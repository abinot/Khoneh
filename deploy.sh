#!/usr/bin/env bash
#
# Sopal production deploy script.
# Assumes: code is already pulled to the deploy dir, PHP/Composer available.
set -euo pipefail

cd "$(dirname "$0")"

echo "==> Pulling latest & installing dependencies"
git pull --ff-only origin main
composer install --no-dev --optimize-autoloader --prefer-dist --no-interaction

echo "==> Migrations (forced)"
php artisan migrate --force

echo "==> Clearing caches then re-caching"
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

echo "==> Set production-safe env checks"
if [ "${APP_ENV:-}" = "production" ] && [ "${APP_DEBUG:-}" = "true" ]; then
    echo "!! APP_DEBUG=true in production. Aborting." >&2
    exit 1
fi

echo "==> Restarting queue workers (if supervisor manages them)"
php artisan queue:restart || true

echo "==> Done. Health: $(curl -fsS http://localhost:8000/up 2>/dev/null || echo 'start the server')"
