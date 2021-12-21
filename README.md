## Getting started

```bash
# install dependencies
composer install

#copy .env.example file and rename it to .env
cp .env.example .env



# change config in .env file

DB_HOST=host_name (localhost)
DB_PORT=port_number (3306)
DB_DATABASE=database_name
DB_USERNAME=username
DB_PASSWORD=password

# generate application key
php artisan key:generate

# create a symbolic link to storage directory
php artisan storage:link

# run migration
php artisan migrate

# run database seeder
php artisan db:seed

```

## Cache

```bash
# cache for better optimization
php artisan optimize
php artisan view:cache
php artisan event:cache
```
