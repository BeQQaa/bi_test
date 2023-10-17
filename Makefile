run:
	docker-compose -f ./server/docker-compose.yml up -d --build
	docker-compose -f ./client/docker-compose.yml up -d --build
	@echo "Begin migration..."
	@sleep 5
	make -f server/Makefile migrate
	make -f server/Makefile link
	make -f server/Makefile tmigration
	@echo "Test Client run on localhost:3000"
	@echo "Test Server run on localhost:80"

down:
	docker-compose -f ./server/docker-compose.yml down -v
	docker-compose -f ./client/docker-compose.yml down -v


run-client:
	docker-compose -f ./client/docker-compose.yml up -d --build
run-server:
	docker-compose -f ./server/docker-compose.yml up -d --build

