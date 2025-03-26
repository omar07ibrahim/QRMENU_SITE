# QRMENU_SITE

A modern QR code menu solution for restaurants and cafes built with Laravel.

## Overview

QRMENU_SITE enables restaurants to digitize their menus through QR codes, allowing customers to view menus, place orders, and make payments directly from their smartphones. This contactless solution improves customer experience while streamlining restaurant operations.

## Installation

```bash
# Clone the repository
git clone https://github.com/username/qrmenu_site.git

# Navigate to project directory
cd qrmenu_site

# Install dependencies
composer install
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Run migrations
php artisan migrate

# Start Laravel Sail
./vendor/bin/sail up -d
```

## Environment Configuration

```
SHOW_DEMO_CREDENTIALS=true
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=laravel
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS='test@example.com'
MAIL_FROM_NAME='App Demo'
```

## Commands

### Testing
```bash
sail artisan test --testsuite=Feature
```

### Clearing Cache
```bash
sail artisan cache:clear
sail artisan config:cache
sail artisan config:clear
sail artisan route:clear
sail artisan route:cache
sail artisan optimize
```

### Creating New Modules
```bash
sail artisan module:make Fields
sail artisan module:make-migration create_fields_table fields
```

### Updates
```bash
git diff --name-only 49b736c231b1de9ae4ecdce31307960a9d13b087 0abba369fa214151892283d938f8e58dacabd592 > .diff-files.txt && npm run zipupdate
COMPOSER_MEMORY_LIMIT=-1 composer require */**
```

### Utilities
```bash
# Create zip without Mac files
zip -r es_lang.zip . -x ".*" -x "__MACOSX"

# Sync missing translation keys
sail artisan translation:sync-missing-translation-keys
```

## Project Structure

```
app/                  - Core application code
bootstrap/            - Framework bootstrap files
config/               - Configuration files
database/             - Database migrations and seeds
modules/              - Custom modules
public/               - Publicly accessible files
resources/            - Views, assets, and language files
routes/               - Route definitions
tests/                - Application tests
vendor/               - Dependencies
```

## License

This project is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
