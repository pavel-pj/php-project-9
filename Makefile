install:
	composer install
	composer update
validate:
	composer validate
up-ul:
	composer dump-autoload
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src public