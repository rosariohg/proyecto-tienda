## Instalar dependencias

composer install

## Crear la base de datos

base de datos
## Generar key

php artisan key:generate

## Scaffold
http://labs.infyom.com/laravelgenerator/

php artisan infyom:api_scaffold Producto

## Modificamos Providers AppService

Schema::defaultStringLength(191)

## Migramos bd

php artisan migrate