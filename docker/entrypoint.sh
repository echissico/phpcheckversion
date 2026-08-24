#!/bin/sh
set -e

# Ensure SQLite database file exists
mkdir -p /var/www/html/database
if [ ! -f /var/www/html/database/database.sqlite ]; then
    touch /var/www/html/database/database.sqlite
fi

# Ensure Laravel storage & cache structure exists
mkdir -p /var/www/html/storage/framework/cache \
         /var/www/html/storage/framework/sessions \
         /var/www/html/storage/framework/views \
         /var/www/html/storage/logs \
         /var/www/html/bootstrap/cache

# Fix ownership and permissions for web server user
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Generate app key if not set
if grep -q "APP_KEY=$" .env 2>/dev/null || grep -q "APP_KEY=\s*$" .env 2>/dev/null || [ -z "$APP_KEY" ]; then
    php artisan key:generate --force || true
fi

# Run pending database migrations
php artisan migrate --force || true

# Execute supervisord process manager
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
