<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About project

This project was build with Laravel.

- PHP 8
- Laravel 11


## Start Project

Before start project make sure that install Laravel, PHP and Composer in your system.

1. Clone the project
2. ``` cd challenge-talentpitch```
3. Make migrations ``` php artisan migrate```
4. Start the project with ``` php artisan serve```

## Endpoints

The host has prefix: "/api" and is versioned, so the complete host is: 

### "/api/v1/"

### Users:

#### Get all users:

This method return one collections of all users in the database

*Method:* GET
*Endpoints:* /users

#### Get specific user:

This method return specific user by id

*Method:* GET
*Endpoints:* /users/{id}

#### Create new user:

This method create a new user.

*Method:* POST
*Endpoints:* /users

| Field     | Type   | Required? | Description                  |
|-----------|--------|-----------|------------------------------|
| name      | String | YES       | User name                    |
| id        | Number | YES       | The user id                  |
| programId | Number | NO        | The program id it belongs to |

#### Update user:

This method update specific user

*Method:* PUT
*Endpoints:* /users/{id}

| Field      | Type   | Required? | Description                  |
|------------|--------|-----------|------------------------------|
| name       | String | NO        | User name                    |
| programsId | Number | NO        | The program id it belongs to |

#### Delete user:

This method destroy specific user

*Method:* DELETE
*Endpoints:* /users/{id}

### Challenges:

#### Get all challenges:

This method return one collections of all challenges in the database

*Method:* GET
*Endpoints:* /challenges

#### Get specific challenge:

This method return specific challenge by id

*Method:* GET
*Endpoints:* /challenges/{id}

#### Create new challenge:

This method create a new challenge.

*Method:* POST
*Endpoints:* /challenges

| Field     | Type   | Required? | Description                  |
|-----------|--------|-----------|------------------------------|
| name      | String | YES       | Challenge name               |
| id        | Number | YES       | The challenge id             |
| programId | Number | NO        | The program id it belongs to |

#### Update challenge:

This method update specific challenge

*Method:* PUT
*Endpoints:* /challenges/{id}

| Field      | Type   | Required? | Description                  |
|------------|--------|-----------|------------------------------|
| name       | String | NO        | Challenge name               |
| programsId | Number | NO        | The program id it belongs to |

#### Delete challenge:

This method destroy specific challenge

*Method:* DELETE
*Endpoints:* /challenges/{id}

### Companies:

#### Get all companies:

This method return one collections of all companies in the database

*Method:* GET
*Endpoints:* /company

#### Get specific company:

This method return specific company by id

*Method:* GET
*Endpoints:* /company/{id}

#### Create new company:

This method create a new company.

*Method:* POST
*Endpoints:* /company

| Field     | Type   | Required? | Description                  |
|-----------|--------|-----------|------------------------------|
| name      | String | YES       | Company name                 |
| id        | Number | YES       | The company id               |
| programId | Number | NO        | The program id it belongs to |

#### Update company:

This method update specific company

*Method:* PUT
*Endpoints:* /company/{id}

| Field      | Type   | Required? | Description                  |
|------------|--------|-----------|------------------------------|
| name       | String | NO        | Company name                 |
| programsId | Number | NO        | The program id it belongs to |

#### Delete company:

This method destroy specific company

*Method:* DELETE
*Endpoints:* /company/{id}

### Programs:

#### Get all programs:

This method return one collections of all programs in the database

*Method:* GET
*Endpoints:* /programs

#### Get specific program:

This method return specific program by id

*Method:* GET
*Endpoints:* /programs/{id}

#### Create new program:

This method create a new program.

*Method:* POST
*Endpoints:* /company

| Field       | Type   | Required? | Description                    |
|-------------|--------|-----------|--------------------------------|
| name        | String | YES       | Program name                   |
| id          | Number | YES       | The program id                 |
| userId      | Number | NO        | The user id it belongs to      |
| companyId   | Number | NO        | The company id it belongs to   |
| challengeId | Number | NO        | The challenge id it belongs to |

#### Update program:

This method update specific program

*Method:* PUT
*Endpoints:* /programs/{id}

| Field      | Type   | Required? | Description                  |
|------------|--------|-----------|------------------------------|
| name       | String | NO        | Program name                 |
| programsId | Number | NO        | The program id it belongs to |
| userId      | Number | NO        | The user id it belongs to      |
| companyId   | Number | NO        | The company id it belongs to   |
| challengeId | Number | NO        | The challenge id it belongs to |

#### Delete programs:

This method destroy specific programs

*Method:* DELETE
*Endpoints:* /programs/{id}
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
