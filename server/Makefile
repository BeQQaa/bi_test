name =
status = test-

up:
	docker-compose up -d

down:
	docker-compose down

upb:
	docker-compose up -d --build

upf:
	docker-compose -f '$(name).yml' up -d --build

migrate:
	docker exec $(status)laravel-scutum-security php artisan migrate

install:
	docker exec $(status)laravel-scutum-security composer install

refresh:
	docker exec $(status)laravel-scutum-security php artisan migrate:refresh

refreshf:
	docker exec $(status)laravel-scutum-security php artisan migrate:refresh --path='/database/migrations/$(name)'

controller:
	docker exec $(status)laravel-scutum-security php artisan make:Controller '$(name)Controller' --resource

model:
	docker exec $(status)laravel-scutum-security php artisan make:Model '$(name)'

request:
	docker exec $(status)laravel-scutum-security php artisan make:Request '$(name)Request'

exception:
	docker exec $(status)laravel-scutum-security php artisan make:Exception '$(name)Exception'

repo:
	docker exec $(status)laravel-scutum-security php > app/Repository/'$(name)Repository.php'

migration:
	docker exec $(status)laravel-scutum-security php artisan make:migration 'create$(name)_table'

factory:
	docker exec $(status)laravel-scutum-security php artisan make:factory '$(name)Factory'

seeder:
	docker exec $(status)laravel-scutum-security php artisan make:seed '$(name)Seeder'

seed:
	docker exec $(status)laravel-scutum-security php artisan db:seed


