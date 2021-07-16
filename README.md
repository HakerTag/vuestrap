# Vuestrap
  
## Description

Vuestrap is Laravel 8 package that replaces Jetstream/Jetstrap's inertia stack view files with BootstrapVue based views.

It also downgrades Vue from Vue3 to Vue2.

## Table of Content
  * [Installation](#installation)
    + [Install Jetstream With Inertia](#install-jetstream-with-inertia)
    + [Install Jetstrap](#install-jetstrap)
    + [Install Vuestrap](#install-vuestrap)
    + [Finalizing The Installation](#finalizing-the-installation)
  * [License](#license)
  
## Installation

It is important you install and configure [Laravel Jetstream](https://github.com/laravel/jetstream) and [Laravel Jetstrap](https://github.com/nascent-africa/jetstrap) before performing a swap.

### Install Jetstream With Inertia

```
composer require laravel/jetstream
```
```
php artisan jetstream:install inertia
php artisan jetstream:install inertia --teams
```

### Install Jetstrap

```
composer require nascent-africa/jetstrap --dev
```
```
php artisan jetstrap:swap inertia
php artisan jetstrap:swap inertia --teams

```

### Install Vuestrap

```
composer require ipimpat/vuestrap --dev
```
```
php artisan vuestrap:swap
php artisan vuestrap:swap --teams
```

### Finalizing The Installation

After installing Vuestrap and swapping Jetstream/Jetstrap resources and then install and build your NPM dependencies and migrate your database:

```
npm install && npm run dev

php artisan migrate
```

## License

Vuestrap is open-sourced software licensed under the [MIT license](https://github.com/ipimpat/vuestrap/blob/master/LICENSE).
