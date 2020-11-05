# Laravel inbox

[![Latest Version on Packagist](https://img.shields.io/packagist/v/justijndepover/laravel-inbox.svg?style=flat-square)](https://packagist.org/packages/justijndepover/laravel-inbox)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/justijndepover/laravel-inbox.svg?style=flat-square)](https://packagist.org/packages/justijndepover/laravel-inbox)

Add an inbox screen to your application to monitor all outgoing emails.

![Screenshot](https://raw.githubusercontent.com/justijndepover/laravel-inbox/master/docs/screenshot.png)

## Caution
This application is still in development and could implement breaking changes. Please use at your own risk.

## Installation
You can install the package with composer
```sh
composer require justijndepover/laravel-inbox
```

After the installation, you have to publish the assets and perform the migration.
```sh
php artisan inbox:install --migration
```

If needed, you can also publish the config file immediately
```sh
php artisan inbox:install --config
```

This is the config file
```php
return [

    /*
    * This setting determines if the Laravel Inbox package should Listen
    * to Sending mail events. If the value is empty, the package will only
    * work if the app is not in production mode
    */
    'enabled' => null,

    /*
    * This is the URI path where Laravel Inbox will be accessible from.
    */
    'path' => 'inbox',

    /*
    * These middleware will get attached onto each Laravel Inbox route, giving you
    * the chance to add your own middleware to this list or change any of
    * the existing middleware. Or, you can simply stick with this list.
    */
    'middleware' => ['web'],

];
```

## Usage
The application will expose an endpoint at `/inbox`.

By default, the package only works if your application environment is not set to production. You can change this behaviour by overwriting the `inbox.enabled` setting.

## Authorization
The `/inbox` endpoint is available to everyone. If you'd like to protect this route, you can do so by registering the following gate.

```php
use Illuminate\Support\Facades\Gate;

Gate::define('viewInbox', function ($user) {
    // your logic here
    return $user->isAdmin();
});
```

A good place to do this is in your `AuthServiceProvider` that ships with Laravel by default.

## Use cases
The main purpose for creating this package was to provide an alternative to [mailtrap](https://mailtrap.io). That's also why the package only works if the application is not in production mode.

If you want to use the package for the same reason, it's recommended to set your mail driver to `log` inside your env file, to prevent your application from actually sending emails.
```
MAIL_MAILER=log
```

## Security
If you find any security related issues, please open an issue or contact me directly at [justijndepover@gmail.com](justijndepover@gmail.com).

## Contribution
If you wish to make any changes or improvements to the package, feel free to make a pull request.

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.