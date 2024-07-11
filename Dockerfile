# Use the official PHP image as the base image
FROM php:8.0-apache

# Install required PHP extensions
RUN docker-php-ext-install mysqli

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy the project files to the Apache document root
COPY . /var/www/html/

# Set permissions for the document root
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 to the host
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
