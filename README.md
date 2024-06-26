# Laravel with Filament - Financial Management Website

This is a simple website built to manage your finances. This website is built using Laravel 10 and comes with the laravel filament package to process the data.

## Installation

1. Download or Clone this Repository
2. Open a terminal inside the project folder

```bash
  composer install
```

3. Change .env.example to .env and please configure the database
4. Generate Key

```bash
  php artisan key:generate
```

5. Migrate the Database

```bash
  php artisan migrate
```

6. Create user

```bash
  php artisan make:filament-user
```

7. Run Laravel

```bash
  php artisan serve
```

8. Please access /admin with the email and password that has been created

<!-- ## Screenshots

![App Screenshot](https://via.placeholder.com/468x300?text=App+Screenshot+Here) -->
