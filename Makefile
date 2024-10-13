.PHONY: start
start:
	docker-compose up --build

.PHONY: stop
stop:
	docker-compose down

.PHONY:
	

.PHONY: lint
lint:
	composer cs-fix