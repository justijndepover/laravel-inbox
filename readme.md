# Laravel inbox

This package is meant to provide your application with an interface to see all outgoing emails while the application is still in development.

![Screenshot](/docs/screenshot.png)

## installation
You can install the package with composer
```
composer require justijndepover/laravel-inbox
```

## usage
By default, the application will expose an endpoint at `/inbox` while the application is not in production mode.

It's recommended to set your mail driver to `log` inside your env file.
```
MAIL_MAILER=log
```

## Security
If you find any security related issues, please contact me directly at [justijndepover@gmail.com](justijndepover@gmail.com) to report it.

## Contribution
If you wish to make any changes or improvements to the package, feel free to make a pull request.

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.