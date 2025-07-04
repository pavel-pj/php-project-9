PORT ?= 8000
start:
	PHP_CLI_SERVER_WORKERS=5 php -S 0.0.0.0:$(PORT) -t public
install:
	composer install
	composer update
validate:
	composer validate
up-ul:
	composer dump-autoload
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src public