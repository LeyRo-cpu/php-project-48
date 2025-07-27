.PHONY: install test lint lint-fix

install:
	composer install

test:
	composer test

lint:
	composer lint

lint-fix:
	composer lint-fix 