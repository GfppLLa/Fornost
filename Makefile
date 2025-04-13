.PHONY: install run

install: 
		composer install
		
run:
		php -S localhost:8000 -t public