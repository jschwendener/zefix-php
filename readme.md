# Zefix PHP SDK

This is a simple PHP wrapper around the [Zefix](https://www.zefix.admin.ch/de/search/entity/welcome) Public [REST API](https://www.zefix.admin.ch/ZefixPublicREST/swagger-ui/index.html) which can be used to search for swiss companies and retrieve their details.
This package is not affiliated with the Zefix.

> [!WARNING]
> This package is currently in development and may not be fully functional.

## Installation

You can install the package via composer:
```sh
composer require jschwendener/zefix-php
```

## Authentication
A valid username and password is required to access the Zefix API.

You can request access by sending an email to zefix@bj.admin.ch and providing the following information:
- An email address which will be used as username
- Additional email addresses which should receive information maintenance and updates of the API

## Usage

### Search for companies

```php
use Jschwendener\Zefix\Zefix;

$zefix = new Jschwendener\Zefix\Zefix('username', 'password');

// Search for companies by name
$results = $zefix->company()->search('company name');

// Search for companies by name and additional parameters
$results = $zefix->company()->search('company name', [
    'canton' => 'ZH',
    'activeOnly' => false,
]);
```

### Get company details

```php
use Jschwendener\Zefix\Zefix;

$zefix = new Jschwendener\Zefix\Zefix('username', 'password');

// Get details for a company by UID
$details = $zefix->company()->getByUid('CHE-123.456.789');
```

## Credits
This SDK is built using [Saloon PHP](https://docs.saloon.dev/).

---
The Zefix PHP SDK is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).