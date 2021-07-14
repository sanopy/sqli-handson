.PHONY: start
start:
	docker compose up -d

.PHONY: stop
stop:
	docker compose down --volumes --remove-orphans

.PHONY: query-log
query-log:
	docker compose exec mysql tail -f /var/log/mysql/query.log

.PHONY: clean
clean:
	docker compose down --rmi all --volumes --remove-orphans