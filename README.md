# sqli-handson

hands-on for SQL injection techniques

## Requirements

- GNU Make
- Docker
- Python3

## Usage

```
$ make [target]

targets:
  start           start docker containers
  stop            stop docker containers
  query-log       show SQL query log
  clean           clean all docker images used by this app
```