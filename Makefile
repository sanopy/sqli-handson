.PHONY: start
start:
	docker compose up -d

.PHONY: stop
stop:
	docker compose down --volumes --remove-orphans

.PHONY: restart
restart: stop start

.PHONY: sql
sql:
	docker compose exec mysql mysql -u mysql -ppassw0rd -D sqli

.PHONY: query-log
query-log:
	docker compose exec mysql tail -f /var/log/mysql/query.log

.PHONY: clean
clean:
	docker compose down --rmi all --volumes --remove-orphans