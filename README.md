
### Setting up this demo

Commands to be executed


    mkdir lab3lara
    cd lab3lara

    ddev config --project-type=laravel --docroot=public --php-version=8.3
    ddev composer create --prefer-dist --no-install --no-scripts laravel/laravel
    ddev composer update
    ddev php artisan key:generate
    ddev get ddev/ddev-phpmyadmin