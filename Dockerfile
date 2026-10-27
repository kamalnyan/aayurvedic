FROM wordpress:apache

# Copy custom Vedamrit theme
COPY wp-content/themes/vedamrit /usr/src/wordpress/wp-content/themes/vedamrit
COPY wp-content/themes/vedamrit /var/www/html/wp-content/themes/vedamrit

# Copy plugins (including SQLite integration for zero-config Render deploys)
COPY wp-content/plugins /usr/src/wordpress/wp-content/plugins
COPY wp-content/plugins /var/www/html/wp-content/plugins

# Copy custom entrypoint for Render port mapping & SQLite
COPY docker-entrypoint-render.sh /usr/local/bin/docker-entrypoint-render.sh
RUN chmod +x /usr/local/bin/docker-entrypoint-render.sh

# Ensure proper permissions
RUN chown -R www-data:www-data /var/www/html/wp-content /usr/src/wordpress/wp-content

ENTRYPOINT ["docker-entrypoint-render.sh"]
