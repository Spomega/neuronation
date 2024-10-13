.PHONY: start
start:
	docker-compose up --build

.PHONY: stop
stop:
	docker-compose down

.PHONY: lint
lint:
	composer cs-fix