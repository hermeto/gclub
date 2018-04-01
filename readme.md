<p align="center">GClub Challenge</p>

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
  app/AptTeam.php
	app/Group.php
	app/GroupResult.php
	app/Http/Controllers/Common/CreateRound.php
	app/Http/Controllers/GeralController.php
	app/Http/Controllers/GroupController.php
	app/Http/Controllers/MatchController.php
	app/Http/Controllers/Playoff/ClearAll.php
	app/Http/Controllers/Playoff/CreateGame.php
	app/Http/Controllers/Playoff/CreateGame/SaveAptTeam.php
	app/Http/Controllers/Playoff/CreateGame/SavePlayoffResult.php
	app/Http/Controllers/Playoff/GetTeam.php
	app/Http/Controllers/Playoff/ValidatePlayoff.php
	app/Http/Controllers/PlayoffController.php
	app/Http/Controllers/Process/ClearAll.php
	app/Http/Controllers/Process/CreateGame.php
	app/Http/Controllers/Process/CreateGame/SaveGroupResult.php
	app/Http/Controllers/Process/CreateGame/SaveTeamScore.php
	app/Http/Controllers/Process/JoinTeamGroup.php
	app/Http/Controllers/Process/ValidateProcess.php
	app/Http/Controllers/ProcessController.php
	app/Playoff.php
	app/Team.php
	app/TeamGroup.php
	database/migrations/2018_03_30_152602_create_table_team.php
	database/migrations/2018_03_30_152747_create_table_group.php
	database/migrations/2018_03_30_163727_create_table_team_group.php
	database/migrations/2018_03_30_184838_create_table_group_result.php
	database/migrations/2018_03_31_145455_create_table_playoff.php
	database/migrations/2018_04_01_005434_create_table_apt_team.php
	database/seeds/DatabaseSeeder.php
	database/seeds/GroupSeeder.php
	database/seeds/TeamSeeder.php
	docker-compose.yml
	public/js/group.js
	public/js/playoff.js
	resources/views/geral.blade.php
	resources/views/group.blade.php
	resources/views/index.blade.php
	resources/views/main.blade.php
	resources/views/match.blade.php
	resources/views/playoff.blade.php
	tests/Unit/Common/CreateRoundTest.php
	tests/Unit/Playoff/ClearAllTest.php
	tests/Unit/Playoff/ValidatePlayoffTest.php
	tests/Unit/Process/ClearAllTest.php
	tests/Unit/Process/JoinTeamGroupTest.php
	tests/Unit/Process/ValidateProcessTest.php
```

#### Submitting bugs and feature requests

Bugs and feature request are tracked on [GitHub](https://github.com/hermeto/gclub/issues)

### Author

Hermeto Romano - <hermeto.romano@gmail.com>
