# Task-Management

## System Requirement
#### PHP: 8.3

## ENV file
copy contents of `env.example`, and paste it in `.env` by creating new file.
Do change `VITE_APP_API_URL` according to the API backend base URL.


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

### Default Credentials

```
email: test@test.com
password: password
```
You can use these credentials for login, which has 100 tasks seeded already.

## Postman Collection
You can find postman collection at the root of the project.
[TaskManagement.postman_collection.json](TaskManagement.postman_collection.json)
