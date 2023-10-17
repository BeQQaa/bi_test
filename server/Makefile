name =
status =

up:
	docker-compose up -d

down:
	docker-compose down -v

upb:
	docker-compose up -d --build

migrate:
	docker exec $(status)local-laravel php artisan migrate

refresh:
	docker exec $(status)local-laravel php artisan migrate:refresh

link:
	docker exec $(status)local-laravel php artisan storage:link
	docker exec $(status)local-laravel php artisan config:clear
	docker exec $(status)local-laravel php artisan optimize:clear

refreshf:
	docker exec $(status)local-laravel php artisan migrate:refresh --path='/database/migrations/$(name)'

controller:
	docker exec $(status)local-laravel php artisan make:Controller '$(name)Controller' --resource

model:
	docker exec $(status)local-laravel php artisan make:Model '$(name)'

request:
	docker exec $(status)local-laravel php artisan make:Request '$(name)Request'

exception:
	docker exec $(status)local-laravel php artisan make:Exception '$(name)Exception'

repo:
	docker exec $(status)local-laravel php > app/Repository/'$(name)Repository.php'

migration:
	docker exec $(status)local-laravel php artisan make:migration 'create_$(name)_table'

factory:
	docker exec $(status)local-laravel php artisan make:factory '$(name)Factory'

seeder:
	docker exec $(status)local-laravel php artisan make:seed '$(name)Seeder'

seed:
	docker exec $(status)local-laravel php artisan db:seed

policy:
	docker exec $(status)local-laravel php artisan make:policy '$(name)Policy'

test:
	docker exec $(status)local-laravel php artisan make:test '$(name)Test'

tmigration:
	docker exec $(status)local-laravel php artisan migrate --env=testing



