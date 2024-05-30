# Use the official Nginx image from the Docker Hub
FROM nginx:latest

# Expose port 82 for the web server
EXPOSE 82

# Copy the index.html file to the Nginx HTML directory
COPY index.html /usr/share/nginx/html/

# Copy the custom Nginx configuration file to the appropriate location
COPY default.conf /etc/nginx/conf.d/

# No need to set WORKDIR since Nginx is already configured to serve files from /usr/share/nginx/html
