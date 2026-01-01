#FE - Facturación electronica

## Correr servidor para desarrollo
npx tailwindcss -i tailwind.css -o ./public/css/tailwind.css --watch

## Base de datos
Crear una tabla, migración y controlador
php artisan make:model Empresa -a
php artisan migrate:refresh --path=/database/migrations/2023_01_26_054039_create_macros_table.php
php artisan migrate:refresh --path=/database/migrations/2023_01_26_054057_create_categorias_table.php.php


## Diseño
https://flowbite.com/docs/getting-started/introduction/