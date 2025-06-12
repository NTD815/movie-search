#!/usr/bin/env bash
set -e

echo "Running composer..."
composer install --no-dev --working-dir=/var/www/html

echo "Creating SQLite DB if it doesn't exist..."
[ -f database/database.sqlite ] || touch database/database.sqlite

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force

echo "Installing and building assets..."
npm install && npm run build
