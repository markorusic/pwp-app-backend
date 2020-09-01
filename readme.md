## Uputstvo za pokretanje

Instalacija biblioteka:
```sh
composer install
```

Environment fajl:
```sh
cat .env.example > .env
```

```sh
Uneti kredencijale za bazu u .env fajlu (DB_NAME, DB_PASSWORD...)
```

Generisati tabele:
```sh
php artisan migrate
php artisan db:seed
```

Generisati kljuceve:
```sh
php artisan key:generate
php artisan jwt:secret
```

Pokrenuti aplikaciju:
```sh
php artisan serve
```
