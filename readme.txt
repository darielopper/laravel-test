Eliminar el problema de la clave de encriptación de Laravel 5.5

1- Renombrar el archivo .env.example por .env
2- Correr el comando php artisan key:generate
3- Cerciorarse que en el archivo .env el campo APP_KEY tenga valor
4- Correr los comandos cache:clear y config:cache