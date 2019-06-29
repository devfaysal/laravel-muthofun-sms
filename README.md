# Laravel Muthofun SMS

Simple Laravel wrapper for MuthoFun SMS Gateway API

## Installation

```bash
composer require devfaysal/laravel-muthofun-sms
```

Publish Config File to set username and password

```php 
php artisan vendor:publish --provider="Devfaysal\Muthofun\MuthofunServiceProvider" 
```


## Use
```php 
use Devfaysal\Muthofun\Facades\Muthofun; 
```

Send SMS to Single user

```php 
Muthofun::send('Phone number' , 'Your Message!!');
```

Send SMS to Multiple user

```php
$users = [
  '01717012345', 
  '01671012345', 
  '01811012345'
]

Muthofun::send($users , 'Your Message!!');

```
