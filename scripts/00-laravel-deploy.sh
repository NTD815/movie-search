#!/usr/bin/env bash
set -e

echo "Running composer..."
composer install --no-dev --working-dir=/var/www/html

echo "Creating SQLite DB if it doesn't exist..."
DB_PATH=database/database.sqlite
if [ ! -f "$DB_PATH" ]; then
  touch $DB_PATH
  chmod 664 $DB_PATH
fi

chmod -R 775 storage bootstrap/cache

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force
