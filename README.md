# Hyperf Base Model

A reference project for building HTTP APIs with [Hyperf](https://hyperf.io/), PHP, Swoole, MySQL, Docker, automated tests, static analysis, and a clean project structure.

The goal of this repository is to provide a practical foundation for developers who want to study, experiment with, or start building applications using the Hyperf framework.

## About the Project

This repository is based on the Hyperf framework and focuses on API development, database persistence, local development with Docker, and maintainable back-end application structure.

It is intended to be used as:

* a learning reference for the Hyperf community;
* a base project for experimenting with Hyperf features;
* a starting point for HTTP API development;
* a practical example of organizing a PHP back-end project with Docker, MySQL, tests, and static analysis.

## Main Goals

* Provide a simple and functional Hyperf project structure.
* Demonstrate how to run a Hyperf application using Docker.
* Include MySQL persistence support.
* Keep the project easy to understand and extend.
* Serve as a community reference for developers studying Hyperf.
* Encourage clean code, testing, and maintainable back-end practices.

## Tech Stack

* PHP 8.1+
* Hyperf 3.1
* Swoole
* MySQL
* Docker
* Docker Compose
* Composer
* PHPUnit / Hyperf Testing
* PHPStan
* PHP-CS-Fixer

## Project Structure

```txt
.
├── app/                    # Application source code
│   └── Controller/          # HTTP controllers
├── bin/                    # Hyperf executable files
├── config/                 # Framework and application configuration
├── migrations/             # Database migrations
├── test/                   # Automated tests
├── .github/workflows/      # GitHub Actions workflows
├── Dockerfile              # Application container image
├── docker-compose.yml      # Local development services
├── composer.json           # PHP dependencies and scripts
├── phpstan.neon.dist       # Static analysis configuration
└── phpunit.xml.dist        # Test configuration
```

## Requirements

You can run this project using Docker, which is the recommended approach.

For local execution without Docker, make sure your environment has:

* PHP 8.1 or higher
* Composer
* Swoole extension
* PDO extension
* PDO MySQL extension
* MySQL
* OpenSSL extension
* JSON extension
* PCNTL extension

## Getting Started

### 1. Clone the repository

```bash
git clone https://github.com/VNCHub/hyperf-base-model.git
cd hyperf-base-model
```

### 2. Create the environment file

```bash
cp .env.example .env
```

### 3. Configure the environment

For Docker usage, make sure your database host points to the MySQL service name:

```env
APP_NAME=hyperf-base-model
APP_ENV=dev

DB_DRIVER=mysql
DB_HOST=hyperf-db
DB_PORT=3306
DB_DATABASE=hyperf
DB_USERNAME=hyperf
DB_PASSWORD=secret
DB_ROOT_PASSWORD=root
DB_CHARSET=utf8mb4
DB_COLLATION=utf8mb4_unicode_ci
DB_PREFIX=
```

### 4. Start the containers

```bash
docker compose up -d --build
```

The application will be available at:

```txt
http://localhost:9501
```

MySQL will be available on:

```txt
localhost:3306
```

### 5. Access the application container

```bash
docker compose exec hyperf-app sh
```

### 6. Install dependencies, if needed

```bash
composer install
```

### 7. Run the application manually, if needed

```bash
composer start
```

## Composer Scripts

This project includes useful Composer scripts for development.

### Start the application

```bash
composer start
```

### Run tests

```bash
composer test
```

### Run static analysis

```bash
composer analyse
```

### Run code style fixer

```bash
composer cs-fix
```

## Development Workflow

A common development workflow for this project is:

```bash
cp .env.example .env
docker compose up -d --build
docker compose exec hyperf-app sh
composer test
composer analyse
```

When changing application code, keep the following checks in mind:

```bash
composer test
composer analyse
composer cs-fix
```

## Database

This project is configured to use MySQL.

The Docker Compose setup provides a MySQL service that can be used during local development.

Default database configuration should be adjusted in the `.env` file according to your environment.

Example for Docker:

```env
DB_HOST=hyperf-db
DB_PORT=3306
DB_DATABASE=hyperf
DB_USERNAME=hyperf
DB_PASSWORD=secret
```

## Testing

Tests are located in the `test/` directory.

To run the test suite:

```bash
composer test
```

The project uses Hyperf testing tools and PHPUnit-compatible execution.

## Static Analysis

Static analysis is configured with PHPStan.

To run the analysis:

```bash
composer analyse
```

Static analysis helps identify type errors, unsafe code, and possible implementation issues before runtime.

## Code Style

PHP-CS-Fixer is available to help keep the codebase consistent.

To apply code style fixes:

```bash
composer cs-fix
```

## What This Project Is

This repository is a reference implementation for developers who want to understand how to structure and run a Hyperf-based HTTP API project.

It provides a simple foundation with Docker, MySQL, testing, static analysis, and development scripts.

## What This Project Is Not

This project is not intended to be a complete production application.

Before using it in production, you should review and adapt:

* authentication and authorization;
* environment variables;
* database credentials;
* error handling;
* logging strategy;
* security rules;
* deployment process;
* CI/CD pipeline;
* observability and monitoring;
* application-specific architecture.

## Roadmap

Possible improvements for this repository:

* Add example CRUD endpoints.
* Add repository and service layers.
* Add request validation examples.
* Add authentication examples.
* Add database seeders.
* Add API documentation.
* Add more automated tests.
* Add examples using events, queues, or async processing.
* Improve CI workflow examples.
* Add production deployment notes.

## Contributing

Contributions are welcome.

This repository is intended to serve as a reference for the community, so improvements, examples, documentation updates, and suggestions are appreciated.

To contribute:

1. Fork the repository.
2. Create a new branch.
3. Make your changes.
4. Run tests and static analysis.
5. Open a pull request with a clear description.

```bash
composer test
composer analyse
```

## License

This project is open-source and available under the terms of the license included in this repository.
