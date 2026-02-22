CREDENCIALES:
EMAIL:  ignacioelmejor@gmail.com
CONTRASEÑA:  ignacio
PASOS:
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run build
php artisan serve
