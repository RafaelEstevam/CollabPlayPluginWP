FROM wordpress
RUN echo 'php_value upload_max_filesize: 300M' > '/var/www/html/.htaccess'
RUN chown -R www-data:www-data /var/www/html/