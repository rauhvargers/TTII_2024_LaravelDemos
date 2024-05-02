
## Setting up this demo

# To start from scratch
Commands to be executed to create this project from scratch

```bat
    mkdir lab3lara
    cd lab3lara

    ddev config --project-type=laravel --docroot=public --php-version=8.3
    ddev composer create --prefer-dist --no-install --no-scripts laravel/laravel
    ddev composer update
    ddev php artisan key:generate
    ddev get ddev/ddev-phpmyadmin

    
    ddev import-db --database=mobile --file=.webtech-lu/001_db_dump.sql
    ddev mysql -uroot -proot < .webtech-lu/001_create_users_perms.sql

    ddev php artisan migrate
    ddev artisan make:controller AutomobileController
```

A good fix for "php executable path not set" problem by some development tools
https://stackoverflow.com/a/73630729/239599

```bat
php artisan make:model Color --migration 
php artisan make:model Fuel --migration 
php artisan make:model Country --migration 
php artisan make:model Manufacturer --migration 
php artisan make:model Car --migration 
```

# To run it on your computer