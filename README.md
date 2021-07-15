# sqli-handson

hands-on for SQL injection techniques

## Requirements

- GNU Make
- Docker
- Python3
  - [Requests](https://docs.python-requests.org/en/master/)

## Usage

```
$ make [target]

targets:
  start           start docker containers
  stop            stop docker containers
  query-log       show SQL query log
  clean           clean all docker images used by this app
```