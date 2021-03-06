# Simple TODO list

## Requirement
- Docker
- Docker compose

## Installation

### 1. Clone project
```
git@github.com:BillWilson/simple-todo.git
```

### 2. Build image and run
```
docker-compose up -d --build
```

### 3. Composer install
```
docker-compose exec app composer install
```

### 4. Init settings
```
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan jwt:secret
```

### 5. Run migrate
```
docker-compose exec app php artisan migrate --seed
```

## Run test
```
vendor/bin/phpunit --testdox -v
```

## Usage
Check api document: https://documenter.getpostman.com/view/826839/SWLe78Fr?version=latest
