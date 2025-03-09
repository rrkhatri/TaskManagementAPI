# Task-Management

## ENV file
copy contents of `env.example`, and paste it in `.env` by creating new file.
Do change `VITE_APP_API_URL` according to the API backend base URL.

## System Requirement
#### PHP: 8.3


## Project Setup

### Install Dependencies
```sh
composer install
```

### Migrate Tables & Seed DB

```sh
php artisan migrate
```
```sh
php artisan db:seed
```

## Default Credentials

```
email: test@test.com
password: password
```
You can use these credentials for login, which has 100 tasks seeded already.
