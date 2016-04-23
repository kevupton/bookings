#!/usr/bin/env bash
if [ ! -d "laravel" ]; then
    composer create-project laravel/laravel;
    composer update;
    cd laravel;
    composer require kevupton/bookings;
    echo "$(awk '/'\''providers'\'' \=\> \[/ { print; print "$PACKAGE_PROVIDER,"; next }1'
       config/app.php)" > config/app.php;
    php artisan vendor:publish;
    php artisan migrate;
fi