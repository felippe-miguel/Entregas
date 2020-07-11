#!/bin/bash
echo "==> Generating key"
php artisan key:generate

echo "==> Clear and config cache"
php artisan cache:clear
php artisan route:clear
php artisan config:cache
php artisan view:clear
