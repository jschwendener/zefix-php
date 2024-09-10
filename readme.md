# Zefix PHP SDK

[![Run Pest tests](https://github.com/jschwendener/zefix-php/actions/workflows/run-tests.yml/badge.svg)](https://github.com/jschwendener/zefix-php/actions/workflows/run-tests.yml)

This is a simple PHP wrapper around the [Zefix](https://www.zefix.admin.ch/de/search/entity/welcome) Public [REST API](https://www.zefix.admin.ch/ZefixPublicREST/swagger-ui/index.html) which can be used to search for swiss companies and retrieve their details.
This package is not affiliated with the Zefix.

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
Search for companies registered in the commercial register by different parameters

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
Get detailed company info by UID

```php
use Jschwendener\Zefix\Zefix;

$zefix = new Jschwendener\Zefix\Zefix('username', 'password');

$details = $zefix->company()->getByUid('CHE-123.456.789');
```

## Credits
This SDK is built using [Saloon PHP](https://docs.saloon.dev/).

---
The Zefix PHP SDK is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).