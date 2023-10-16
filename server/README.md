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
  
#### `run-client`:

- **Description**: This command is used to start only the client service using Docker Compose.
- **Usage**:
  ```bash
  make run-client
  ```

#### `run-server`:

- **Description**: This command is used to start only the server service using Docker Compose.
- **Usage**:
  ```bash
  make run-server
 

These commands are part of a Makefile and are designed to simplify the management of your server and client services
using Docker Compose. You can run them from your command line to perform the specified actions as described.

