#!/usr/bin/env bash
if [ ! -d "laravel" ]; then
    composer create-project laravel/laravel
    cd laravel
    composer update
    composer require kevupton/bookings
    echo "$(awk '/'\''providers'\'' \=\> \[/ { print; print "'$PACKAGE_PROVIDER',"; next }1' \
       config/app.php)" > config/app.php
    php artisan vendor:publish
    php artisan migrate
    cd ..
fi