FROM nginx:1.12.2

# Copy config files.
COPY default.template /etc/nginx/conf.d/

RUN rm -rf /etc/nginx/conf.d/default.conf

# Copy sh files.
COPY envsubst.sh /etc/nginx/conf.d/
RUN chmod +x /etc/nginx/conf.d/envsubst.sh
ENTRYPOINT ["/var/www/app/docker/nginx/envsubst.sh"]

# Make port 80 available to the world outside the container
EXPOSE 80

# Run the nginx server
CMD ["nginx", "-g", "daemon off;"]
