<p align="center"><a href="javascript:void(0);" target="_blank"><img src="https://i.ibb.co/vwWXbPq/fd6cbedb32c046e3b3e505080182ba67.png" width="80"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Simple Support Ticket System

![img-1](https://i.ibb.co/BfVGzgX/screencapture-support-ticket-test-dashboard-2021-08-29-21-58-53.png)

![img-1](https://i.ibb.co/t2myn7Z/screencapture-support-ticket-test-ticket-1-2021-08-29-21-59-22.png)

## About
This is a simple support ticket system app build with laravel framework, the purpose of this project is to practice and learn how to use laravel. This project using basic laravel authentication for login-logout and `Gate` for the authorization.

## Installation
copy `.env-example` file and update the database credentials section according to yours.

First install the depedencies using composer
```
    composer install
```
next, generate the key
```
    php artisan key:generate
```
next, running the migration and seeder
```
    php artisan migrate:fresh --seed
```

## Depedencies
1. Laravel 8.X
2. Trix Editor
