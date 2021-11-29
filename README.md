# Athletes API

## Install

Run composer:
```
composer install
```

Copy `.env.example` to `.env` and config database:

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=athletes-api
DB_USERNAME=
DB_PASSWORD=
```

Run migrations:

```
php artisan migrate
```

Run seeds (optional):

```
php artisan db:seed
```

Import postman collection `postman_collection.json` with all endpoints.

