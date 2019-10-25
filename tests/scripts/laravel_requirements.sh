#!/bin/bash


rm -rf /root/test
mkdir -p /root/test
cd /root/test
composer global require laravel/installer
composer create-project --prefer-dist laravel/laravel blog "5.8.*"
cd blog
php artisan serve --host=0.0.0.0 --port=9800