run:
	docker-compose -f ./server/docker-compose.yml up -d --build
	docker-compose -f ./client/docker-compose.yml up -d --build
	@echo "Begin migration..."
	@sleep 5
	make -f server/Makefile migrate

down:
	docker-compose -f ./server/docker-compose.yml down -v
	docker-compose -f ./client/docker-compose.yml down -v


run-client:
	docker-compose -f ./client/docker-compose.yml up -d --build
run-server:
	docker-compose -f ./server/docker-compose.yml up -d --build

