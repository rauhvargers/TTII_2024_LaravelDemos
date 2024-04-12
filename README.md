
### Setting up this demo

Commands to be executed

    mkdir lab3lara
    cd lab3lara

    ddev config --project-type=laravel --docroot=public --php-version=8.3
    ddev composer create --prefer-dist --no-install --no-scripts laravel/laravel
    ddev composer update
    ddev php artisan key:generate
    ddev get ddev/ddev-phpmyadmin

    
    ddev import-db --database=mobile --file=.webtech-lu/000_db_dump.sql
    ddev mysql -uroot -proot < .webtech-lu/001_create_users_perms.sql

    ddev php artisan migrate
    ddev artisan make:controller AutomobileController


A good fix for "php executable path not set" problem by some development tools
https://stackoverflow.com/a/73630729/239599
