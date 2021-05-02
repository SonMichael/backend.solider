#!/bin/sh
docker-compose exec php-server bash -c "bower install --allow-root"
docker-compose exec php-server bash -c "composer global require fxp/composer-asset-plugin:^1.4.3"
docker-compose exec php-server bash -c "composer install --prefer-dist"
