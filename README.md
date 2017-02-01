# Laravel 5.4 Auth Starter Kit

Basic implementation of default Laravel Auth + Roles + Permissions. 

## Usage

### Step 1: Install Through Composer

```
composer require kneipp/laravel-auth-starter
```

### Step 2: Add the Service Provider

Add the provider in `config/app.php`:

```php
Kneipp\LaravelAuthStarter\LaravelAuthStarterServiceProvider::class,
```


### Step 3: Almost done

- Run: php make:auth

- Run: php artisan vendor:publish --provider="Kneipp\LaravelAuthStarter\LaravelAuthStarterServiceProvider"
  
- Run: php artisan migrate

- Run: composer dump-autoload 

- Run: php artisan db:seed --class=LaravelAuthStarterTableSeeder

### Models

If you want customizing your models (also change config/ntrust.php values):

#### Role

Create a Role model inside `app/Role.php` using the following example:

```php
<?php 

namespace App;

use Kneipp\LaravelAuthStarter\Role as BaseRole;

class Role extends BaseRole
{
    // your custom code if you need it
}
```

#### Permission

Create a Permission model inside `app/Permission.php` using the following example:

```php
<?php 

namespace App;

use Kneipp\LaravelAuthStarter\Permission as BasePermission;

class Permission extends BasePermission
{
    // your custom code
}

```

#### User

Change User model `app/User.php` using the following example:

```php
<?php

namespace App;

use Kneipp\LaravelAuthStarter\User as BaseUser;

class User extends BaseUser
{
    // your custom code
}
```



