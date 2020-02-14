# todovel: A Laradock and Laravel Learning Journey

## Installation

### Get Laradock installed and working:

see this: https://laradock.io/getting-started/

Basically, set up a project workspace then in there do this
```sh
git clone https://github.com/laradock/laradock.git`
cd laradock
cp env-example .env
```
In `.env` select the project directory: `APP_CODE_PATH_HOST=../project-z/`


### Laravel Install

See here: https://laravel.com/docs/master/installation

Also possible: Download latest release from here https://github.com/laravel/laravel/releases and pipe it into `tar`:

```sh
curl https://codeload.github.com/laravel/laravel/tar.gz/v6.8.0 | tar xz
```

### Running the containers

`docker-compose up -d nginx mariadb`

### Getting in there an installing everything

Get a shell to start working:
`docker-compose exec --user=laradock workspace bash`

Then do something like this:
```sh
composer require laravel/ui --dev
composer install
php artisan ui vue --auth
```
