<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## 🔧 Requirements

-   PHP 8.5
-   Composer
-   MySQL / MariaDB
-   Node.js dan NPM (untuk build asset)
-   Laravel 11 / 12

## 🚀 Instalasi

1. Clone git repository Linguasphere : https://github.com/PPLKelompok9/linguasphere.git
2. Instalasi dependensi : composer install
3. Instalasi dependensi Node.Js :npm install

-   Jika menggunakan database local lakukan langkah 4 dan 5, jika menggunakan database online skip langkah 4 dan 5

4. Generate application key : php artisan key:generate
5. Lakukan migrate database dan seeder : php artisan migrate --seed
6. Ubah upload_max_filesize dan post_max_size pada file php.ini, sesuaikan berapa ukuran max yang diijinkan.
7. Jalankan program : composer run dev / npm run dev + php artisan serve

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).
