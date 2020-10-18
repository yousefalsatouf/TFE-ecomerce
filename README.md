# SPORTCub

How to install this project on your machine ???

## Installation

first clone the git repo on your machine .
In your terminal tab 

```bash
git clone https://github.com/yousefalsatouf/TFE-ecomerce.git
```
then install composer and npm

```bash
composer install
npm install
```

## Usage
now to run your project your need to create .env end set connection to the database..

```php
cp .env.example .env
```
your might need to generate a kay to run laravel app
```php
php artisan key:generate
```
and last but not least run the app by 
```php
php artisan serve
npm run watch 
```
run migration with seeder using 
```php
php artisan migrate:fresh --seed
```

and your are done !!
