<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Certainly! Here is the documentation for the provided commands in English:

---

### Command Documentation using the Makefile

#### `run`:

- **Description**: This command is used to start both the server and client services using Docker Compose. It also
  triggers a migration process on the server.
- **Usage**:
  ```bash
  make run
  ```

#### `down`:

- **Description**: This command is used to stop and remove the server and client services along with their associated
  volumes.
- **Usage**:
  ```bash
  make down
  ```

#### Or run env by ourself
#### `run-server`:
```bash
docker-compose -f ./server/docker-compose.yml up -d --build
```
#### `run-client`:
```bash
docker-compose -f ./client/docker-compose.yml up -d --build
````
#### `run-migration local`:
```bash
docker exec local-laravel php artisan migrate
```
#### `run-link storage to the public`:
```bash
docker exec $(status)local-laravel php artisan storage:link
```
#### `run-create sqlite database`:
```bash
touch server/database/testing.sqlite
```
#### `run-create sqlite database`:
```bash
docker exec $(status)local-laravel php artisan migrate --env=testing
```

