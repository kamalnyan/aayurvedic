#!/bin/bash
set -e

# Port binding for Render
PORT="${PORT:-80}"
sed -i "s/Listen 80/Listen ${PORT}/g" /etc/apache2/ports.conf
sed -i "s/:80/:${PORT}/g" /etc/apache2/sites-available/*.conf

# Configure SQLite if no MySQL DB is specified
if [ -z "$WORDPRESS_DB_HOST" ]; then
    echo "No WORDPRESS_DB_HOST provided. Setting up zero-config SQLite database..."
    mkdir -p /var/www/html/wp-content/database
    chown -R www-data:www-data /var/www/html/wp-content/database

    if [ -f /var/www/html/wp-content/plugins/sqlite-database-integration/db.copy ]; then
        cp /var/www/html/wp-content/plugins/sqlite-database-integration/db.copy /var/www/html/wp-content/db.php
        chown www-data:www-data /var/www/html/wp-content/db.php
    fi

    # Create wp-config.php if not exists
    if [ ! -f /var/www/html/wp-config.php ]; then
        cat << 'EOF' > /var/www/html/wp-config.php
<?php
define( 'DB_NAME', 'wordpress' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

define( 'AUTH_KEY',         '2a75eede48124c3b1fb2fc204bc4025ca806cc7d' );
define( 'SECURE_AUTH_KEY',  'd0511979566cc2e4ff3e8c463a56dd791744bd44' );
define( 'LOGGED_IN_KEY',    'a3425fcb82e99312ae467d0c0528416f5e5887f4' );
define( 'NONCE_KEY',        'f0a263ec3841c11b051bf30b1f4a16dca0a19a6a' );
define( 'AUTH_SALT',        'b3c6308d26003c3c8b18e6db6d6ea53827c7bde5' );
define( 'SECURE_AUTH_SALT', '99d784e3381b6845d55389100249336417147839' );
define( 'LOGGED_IN_SALT',   '36ff9924a73fb6ab5715b02bace1d7bbac21b6e2' );
define( 'NONCE_SALT',       'dfcbe9802cc2c9c0918b049a03598e88009b6129' );

$table_prefix = 'wp_';
define( 'WP_DEBUG', false );

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false) {
    $_SERVER['HTTPS'] = 'on';
}

if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
EOF
        chown www-data:www-data /var/www/html/wp-config.php
    fi
fi

# Enable mod_rewrite and setup .htaccess
a2enmod rewrite
if [ ! -f /var/www/html/.htaccess ]; then
    cat << 'EOF' > /var/www/html/.htaccess
# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress
EOF
    chown www-data:www-data /var/www/html/.htaccess
fi

# Call original WordPress entrypoint
exec docker-entrypoint.sh apache2-foreground
