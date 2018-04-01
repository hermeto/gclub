<p align="center">Gamers Club Challenge</p>

### Installation
#### With install.sh
#### Manually
- Clone the project:
```bash
git clone git@github.com:hermeto/gclub.git
```
- Install composer packages:
```bash
docker run --rm -v $(pwd)/gclub:/app composer:latest install
```
- Copy .env file:
```bash
cp gclub/.env.example gclub/.env
```
- Make Laravel key;
```bash
docker run --rm -v $(pwd)/gclub:/app -it hermeto/gclub:php7-alpine php app/artisan key:generate
```
- Upload containers with docker-compose:
```bash
docker-compose -f gclub/docker-compose.yml up -d
```
- Install database:
```bash
docker exec -it gclub-app php artisan migrate
```
- Generate fake data:
```bash
docker exec -it gclub-app php artisan db:seed
```
### About

#### Requirements

- This app works with PHP 7.2 or above.
- [Docker](https://docs.docker.com/install/) (^18.04.0-ce-rc1)
- [docker-compose](https://docs.docker.com/compose/install/) (^1.19.0)

#### Docker images
- [hermeto/gclub:php7-alpine](https://store.docker.com/community/images/hermeto/gclub)
- [mysql:latest](https://store.docker.com/images/mysql)
- [composer:latest](https://store.docker.com/images/composer)
- [phpunit:phpunit](https://store.docker.com/community/images/phpunit/phpunit)

#### Submitting bugs and feature requests

Bugs and feature request are tracked on [GitHub](https://github.com/hermeto/gclub/issues)

### Author

Hermeto Romano - <hermeto.romano@gmail.com>
