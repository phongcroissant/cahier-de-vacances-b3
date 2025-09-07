# Use nginx to serve the pre-built application
FROM nginx:alpine

# Copy the pre-built application
COPY ./dist /usr/share/nginx/html

# Copy custom nginx configuration if needed
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Expose port 80
EXPOSE 80

# Start nginx
CMD ["nginx", "-g", "daemon off;"]