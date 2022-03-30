# Laravel Muthofun SMS
[![Latest Version on Packagist](https://img.shields.io/packagist/v/devfaysal/laravel-muthofun-sms.svg)](https://packagist.org/packages/devfaysal/laravel-muthofun-sms)
[![Total Downloads](https://img.shields.io/packagist/dt/devfaysal/laravel-muthofun-sms.svg)](https://packagist.org/packages/devfaysal/laravel-muthofun-sms)

Simple Laravel wrapper for MuthoFun SMS Gateway API

## Installation

```bash
composer require devfaysal/laravel-muthofun-sms
```

Optionally Publish Config File

```php 
php artisan vendor:publish --provider="Devfaysal\Muthofun\MuthofunServiceProvider" 
```
## Set API key

Copy the api key from https://clients.muthobarta.com/developers/api and add to the .env file.  
Example:
```MUTHOFUN_API_KEY=1f2d5f6e9e9e8r5d5s5s6f9f```

## Use

Send SMS to Single recipient

```php 
use Devfaysal\Muthofun\Facades\Muthofun; 

Muthofun::send('01717012345' , 'Your Message!!');
```

Send SMS to Multiple recipients

```php
use Devfaysal\Muthofun\Facades\Muthofun; 

$users = [
  '01717012345', 
  '01671012345', 
  '01811012345'
]

Muthofun::send($users , 'Your Message!!');

```

TODO:  
- [ ] Sending Personalized SMS (Send different message for different recipient.)

### Security

If you discover any security related issues, please email devfaysal@gmail.com instead of using the issue tracker.

## Credits

- [Faysal Ahamed](https://github.com/devfaysal)
- [All Contributors](../../contributors)
