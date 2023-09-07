composer require doctrine/dbal
php artisan make:migration modify_id_to_uuid --path=database/migrations/migrations_v2
php artisan migrate --path=database/migrations/migrations_v2
