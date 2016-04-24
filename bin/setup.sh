#!/usr/bin/env bash
if [ ! -f "laravel/composer.json" ]; then
    rm -rf laravel
    composer create-project laravel/laravel
    cd laravel
    composer update
    composer require kevupton/bookings
    awk '/'\''providers'\''[^\n]*?\[/ { print; print "'$PACKAGE_PROVIDER',"; next }1' \
       config/app.php
    echo "$(awk '/'\''providers'\''[^\n]*?\[/ { print; print "'$PACKAGE_PROVIDER',"; next }1' \
       config/app.php)" > config/app.php
    php artisan vendor:publish
    php artisan migrate
    cd ..
fi