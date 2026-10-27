#!/bin/bash
set -e

# Port binding for Render
PORT="${PORT:-80}"
sed -i "s/Listen 80/Listen ${PORT}/g" /etc/apache2/ports.conf
sed -i "s/:80/:${PORT}/g" /etc/apache2/sites-available/*.conf

# Configure SQLite if no MySQL DB is specified
if [ -z "$WORDPRESS_DB_HOST" ]; then
    echo "No WORDPRESS_DB_HOST provided. Enabling SQLite database..."
    mkdir -p /var/www/html/wp-content/database
    chown -R www-data:www-data /var/www/html/wp-content/database
    if [ -f /var/www/html/wp-content/plugins/sqlite-database-integration/db.copy ]; then
        cp /var/www/html/wp-content/plugins/sqlite-database-integration/db.copy /var/www/html/wp-content/db.php
        chown www-data:www-data /var/www/html/wp-content/db.php
    fi
fi

# Enable mod_rewrite
a2enmod rewrite

# Call original WordPress entrypoint
exec docker-entrypoint.sh apache2-foreground
