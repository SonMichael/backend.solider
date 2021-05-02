#!/bin/sh
set -e
envsubst '\$API_URL \$FRONTEND_URL \$BACKEND_URL' < /etc/nginx/conf.d/default.template > /etc/nginx/conf.d/default.conf
exec "$@"
