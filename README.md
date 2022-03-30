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

## Upgrade Guide
If you were using the old API, follow the steps to upgrade
- If you publised the config file, republish the config file   ```php artisan vendor:publish --provider="Devfaysal\Muthofun\MuthofunServiceProvider" --force ```
- Remove old username and password from config or .env file
- add new api key to the .env file

## Use

**Send SMS to Single recipient**

```php 
use Devfaysal\Muthofun\Facades\Muthofun; 

Muthofun::send('01717012345' , 'Your Message!!');
//Returns status code. 200 for success
```

**Send SMS to Multiple recipients**

```php
use Devfaysal\Muthofun\Facades\Muthofun; 

$users = [
  '01717012345', 
  '01671012345', 
  '01811012345'
]

Muthofun::send($users , 'Your Message!!');
//Returns status code. 200 for success

```
**Delivery report**

```php
use Devfaysal\Muthofun\Facades\Muthofun;

Muthofun::deliveryReport();
//Returns array
[
  [
    "shoot_id" => "R200008462443416b5e06"
    "receiver" => "8801671012345"
    "sender_id" => "8809601000000"
    "operator_name" => "Airtel"
    "sms_type" => "text"
    "sms_length" => 24
    "sms_count" => 1
    "sms_body" => "Testing package from app"
    "sms_rate" => 0.25
    "sms_cost" => 0.25
    "status" => "Delivered"
    "created_at" => "2022-03-30T16:42:28.797410+06:00"
  ],
  [
    "shoot_id" => "R2000084624434169918a"
    "receiver" => "8801717012345"
    "sender_id" => "8809601000000"
    "operator_name" => "GP"
    "sms_type" => "text"
    "sms_length" => 24
    "sms_count" => 1
    "sms_body" => "Testing package from app"
    "sms_rate" => 0.25
    "sms_cost" => 0.25
    "status" => "Delivered"
    "created_at" => "2022-03-30T16:42:28.782344+06:00"
  ]
]
```

**Account balance**

```php
use Devfaysal\Muthofun\Facades\Muthofun; 

//Get only balance
Muthofun::accountBalance();
//Returns balance in BDT
3.5

//Get details balance information
Muthofun::accountBalance(true);
//Returns array
[
  "code" => 200
  "message" => "User balance received successfully!"
  "balance" => 3.5
  "expiry" => "2022-04-28T11:05:21.671640Z"
]
```

TODO:  
- [ ] Sending Personalized SMS (Send different message for different recipient.)

### Security

If you discover any security related issues, please email devfaysal@gmail.com instead of using the issue tracker.

## Credits

- [Faysal Ahamed](https://github.com/devfaysal)
- [All Contributors](../../contributors)
