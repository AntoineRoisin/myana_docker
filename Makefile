setup:
	@make build
	@make up
	@make composer-install
	@make npm-install
	@make npm-run-dev
	@make storage-rights
	@make storage-link
	@make db-sq-light
	@make data

build:
	docker-compose build --no-cache --force-rm
stop:
	docker-compose stop
up:
	docker-compose up -d
bash:
	docker exec -it myana-laravel-docker bash
composer-update:
	docker exec myana-laravel-docker bash -c "composer update"
composer-install:
	docker exec myana-laravel-docker bash -c "composer install"

storage-rights:
	sudo chown www-data:www-data -R ./laravel-app/storage

storage-link:
	docker exec myana-laravel-docker bash -c "php artisan storage:link"

npm-install:
	docker exec myana-laravel-docker bash -c "npm install"
npm-run-dev:
	docker exec myana-laravel-docker bash -c "npm run dev"

data:
	docker exec myana-laravel-docker bash -c "php artisan migrate"
	docker exec myana-laravel-docker bash -c "php artisan db:seed"

db-sq-light:
	docker exec myana-laravel-docker bash -c "touch /var/www/html/database/database.sqlite"
	docker exec myana-laravel-docker bash -c "chmod -R 777 /var/www/html/database/database.sqlite"

