up: docker-up
down: docker-down
restart: down up
lint: api-lint

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

api-init: api-composer-install api-permissions

api-permissions:
	docker run --rm -v ${PWD}/api:/app -w /app alpine chmod 777 var

api-composer-install:
	docker-compose run --rm api-php-cli composer install

api-lint:
	docker-compose run --rm api-php-cli composer lint
