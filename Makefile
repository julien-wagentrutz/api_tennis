
SYMFONY       = $(EXEC_PHP) bin/console
SYMFONY_BIN   = symfony
COMPOSER      = composer
DOCKER        = docker
DOCKER_COMP   = docker-compose

## —— Composer 🧙‍♂️ ————————————————————————————————————————————————————————————
composer-install: composer.lock ## Install vendors according to the current composer.lock file
	$(COMPOSER) install --no-progress --no-suggest --prefer-dist --optimize-autoloader

composer-update: composer.json ## Update vendors according to the composer.json file
	$(COMPOSER) update


## —— Symfony 💻 ———————————————————————————————————————————————————————————————

start-server:
	$(SYMFONY_BIN) server:start

restart-server:
	$(SYMFONY_BIN) server:restart

stop-server:
	$(SYMFONY_BIN) server:stop

cert-install:
	$(SYMFONY_BIN) server:ca:install

load-fixtures: ## Build the DB, control the schema validity, load fixtures and check the migration status
	$(SYMFONY) doctrine:cache:clear-metadata
	$(SYMFONY) doctrine:database:create --if-not-exists
	$(SYMFONY) doctrine:schema:drop --force
	$(SYMFONY) doctrine:schema:create
	$(SYMFONY) doctrine:schema:validate
	$(SYMFONY) doctrine:fixtures:load -n

## —— Docker 🐳 ————————————————————————————————————————————————————————————————

docker-up: docker-compose.yml ## Start the docker hub
	$(DOCKER_COMP) -f docker-compose.yml up -d

docker-build: docker-compose.yml ## UP+rebuild the application image
	$(DOCKER_COMP) -f docker-compose.yml build

docker-down: docker-compose.yml ## Stop the docker hub
	$(DOCKER_COMP) down --remove-orphans

docker-bash: ## Connect to the application container
	$(DOCKER) exec -it php-fpm bash

docker-exit-bash:
	exit


## —— Project 🔥 ———————————————————————————————————————————————————————————————

build: docker-build docker-up composer-install docker-bash

run: docker-up composer-update docker-bash

run-server: cert-install start-server

stop: stop-server docker-down
