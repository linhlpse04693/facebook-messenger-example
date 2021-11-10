build: ## build develoment environment
	cp .env.example .env
	cp ./laravel/.env.example ./laravel/.env
	docker-compose build
	docker-compose run --rm php composer install
	docker-compose run --rm php cp .env.example .env
	docker-compose run --rm php php artisan key:generate
serve:
	docker-compose up -d
stop:
	docker-compose stop
down:
	docker-compose down -v
migrate:
	docker-compose run --rm php php artisan migrate
	docker-compose run --rm php php artisan db:seed