This is a PHP SDK for the Swiss Zefix REST API (company registry). Built on [Saloon PHP](https://docs.saloon.dev/) (v3/v4).

## Commands

- **Run all tests:** `composer test` (runs Pest)
- **Run a single test:** `vendor/bin/pest tests/Feature/SearchCompanyTest.php`
- **Run tests with filter:** `vendor/bin/pest --filter="searches for a company"`
- **Static analysis:** `composer analyse` (PHPStan level 8)

## Test Setup

Feature tests hit the live Zefix API. They require a `.env` file in the project root with `ZEFIX_USERNAME` and `ZEFIX_PASSWORD`. The `zefix()` helper in `tests/Pest.php` loads these credentials. Unit tests (e.g., `ConnectorTest`) don't need credentials.
