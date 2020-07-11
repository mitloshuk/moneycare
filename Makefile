build:
	@docker-compose build

up:
	@docker-compose up -d

down:
	@docker-compose down

bash:
	@docker-compose exec app /bin/bash

composer-update:
	@docker-compose exec -T app composer update -d /app

composer-install:
	@docker-compose exec -T app composer install -d /app

test:
	@docker-compose exec -T app /app/vendor/bin/phpunit --testdox -v /app/tests