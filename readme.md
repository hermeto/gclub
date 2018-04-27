<p align="center">GClub Challenge</p>

[![Build Status](https://travis-ci.org/hermeto/gclub.svg?branch=master)](https://travis-ci.org/hermeto/gclub)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/hermeto/gclub/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/hermeto/gclub/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/hermeto/gclub/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

### Installation

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
- Upload containers with docker-compose (this process may take up to 35 seconds after the images download):
```bash
docker-compose -f gclub/docker-compose.yml up -d
```
- Install database (after MySQL container started):
```bash
docker exec -it gclub-app php artisan migrate
```
- Generate fake data:
```bash
docker exec -it gclub-app php artisan db:seed
```
- Run unit tests:
```bash
docker run --rm -it -v $(pwd)/gclub:/app phpunit/phpunit:latest --testsuit=Unit
```
- Access your local environment: http://172.11.0.2

### About

#### Requirements

- This app works with PHP (^7.0)
- [Docker](https://docs.docker.com/install/) (^18.04.0-ce-rc1)
- [docker-compose](https://docs.docker.com/compose/install/) (^1.19.0)

#### Docker images
- [hermeto/gclub:php7-alpine](https://store.docker.com/community/images/hermeto/gclub)
- [mysql:latest](https://store.docker.com/images/mysql)
- [composer:latest](https://store.docker.com/images/composer)
- [phpunit:phpunit](https://store.docker.com/community/images/phpunit/phpunit)

#### Files for review
```bash
app/
├── AptTeam.php
├── Group.php
├── GroupResult.php
├── Http
│   ├── Controllers
│   │   ├── Common
│   │   │   └── CreateRound.php
│   │   ├── GeralController.php
│   │   ├── GroupController.php
│   │   ├── MatchController.php
│   │   ├── Playoff
│   │   │   ├── ClearAll.php
│   │   │   ├── CreateGame
│   │   │   │   ├── SaveAptTeam.php
│   │   │   │   └── SavePlayoffResult.php
│   │   │   ├── CreateGame.php
│   │   │   ├── GetTeam.php
│   │   │   └── ValidatePlayoff.php
│   │   ├── PlayoffController.php
│   │   ├── Process
│   │   │   ├── ClearAll.php
│   │   │   ├── CreateGame
│   │   │   │   ├── SaveGroupResult.php
│   │   │   │   └── SaveTeamScore.php
│   │   │   ├── CreateGame.php
│   │   │   ├── JoinTeamGroup.php
│   │   │   └── ValidateProcess.php
│   │   └── ProcessController.php
├── Playoff.php
├── TeamGroup.php
└── Team.php
database/
├── migrations
│   ├── 2018_03_30_152602_create_table_team.php
│   ├── 2018_03_30_152747_create_table_group.php
│   ├── 2018_03_30_163727_create_table_team_group.php
│   ├── 2018_03_30_184838_create_table_group_result.php
│   ├── 2018_03_31_145455_create_table_playoff.php
│   └── 2018_04_01_005434_create_table_apt_team.php
└── seeds
    ├── DatabaseSeeder.php
    ├── GroupSeeder.php
    └── TeamSeeder.php
public/js/
├── group.js
└── playoff.js
resources/views/
├── geral.blade.php
├── group.blade.php
├── index.blade.php
├── main.blade.php
├── match.blade.php
└── playoff.blade.php
tests/Unit/
├── Common
│   └── CreateRoundTest.php
├── Playoff
│   ├── ClearAllTest.php
│   └── ValidatePlayoffTest.php
└── Process
    ├── ClearAllTest.php
    ├── JoinTeamGroupTest.php
    └── ValidateProcessTest.php
docker-compose.yml
```

#### Submitting bugs and feature requests

Bugs and feature request are tracked on [GitHub](https://github.com/hermeto/gclub/issues)

### Author

Hermeto Romano - <hermeto.romano@gmail.com>
