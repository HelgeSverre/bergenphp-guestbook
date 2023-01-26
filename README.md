# BergenPHP Demo - Guestbook

Demo av en gjestebok bygget i Laravel, bruker SQLite som database, for å gjøre setup enkelt.

## Setup

```
git clone git@github.com:HelgeSverre/bergenphp-guestbook.git
cd bergenphp-guestbook
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate --force
php artisan db:seed
php artisan serve --port=80
```
