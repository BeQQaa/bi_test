run:
	docker-compose -f ./server/docker-compose.yml up -d --build

run-client:
	docker-compose -f ./client/docker-compose.yml up -d --build
run-server:
	docker-compose -f ./server/docker-compose.yml up -d --build
