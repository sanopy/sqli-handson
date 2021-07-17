# Bypass Authentication

## サーバーの起動

本リポジトリを手元にクローン後、makeコマンドを用いてローカルの開発環境を立ち上げることができます。

```bash
$ git clone https://github.com/sanopy/sqli-handson.git
$ cd sqli-handson
$ make start
```

## アプリケーション理解

http://localhost:8080/login.php にアクセスするとログインページが表示されます。

このページ上でログイン可能なユーザーは [seeds.sql](https://github.com/sanopy/sqli-handson/blob/main/docker/mysql/migrate/002_seeds.sql) から確認可能です。

## ソースコード理解

このページのソースコードは [login.php](https://github.com/sanopy/sqli-handson/blob/main/src/login.php) から確認可能です。

また、ソースコードを詳しく調べると、 [SQLのクエリを構築する部分](https://github.com/sanopy/sqli-handson/blob/56a474a59028ed45aef3af34d99f867158063a5e/src/login.php#L8) にSQLインジェクションの脆弱性が存在することが分かります。

### 発行されるSQLクエリを観察

id: `admin`, password: `passw0rd!` を入力したときは、以下のようなクエリが発行されます。

```sql
SELECT * FROM users WHERE username='admin' AND password='passw0rd!'
```

以下のコマンドを実行することで、SQLサーバー上で実際に実行されたクエリを確認することができます。
こちらからも、実際に上記のようなクエリが実行されていることが確認できるかと思います。

```bash
$ make query-log
```

## ログイン処理をバイパスする

ここで、id: `admin`, password: `' OR 1=1-- ` という値を入力してみます。
すると、以下のようなクエリが発行されることが確認できます。

```sql
SELECT * FROM users WHERE username='admin' AND password='' OR 1=1-- '
```

入力されたパスワードは実際のパスワードとは異なるものの、発行されたSQLは正しい構文かつ、 `username='admin'` の WHERE 条件のみに該当するレコードを取得するクエリになっていることが分かります。
したがって、このようなアプリケーションの実装の場合、パスワードが未知であっても容易にログイン可能となります。

### Pythonから同様の処理を実行

先程のログインバイパス処理は [bypass_authentication.py](https://github.com/sanopy/sqli-handson/blob/main/poc/bypass_authentication.py) に記述されており、以下のコマンドによって実行可能です。

```bash
$ python3 poc/bypass_authentication.py
```

このあと、このスクリプトをベースに作成されたPoCが登場します。
ここで、PythonやRequestsモジュールを使った記述方法に慣れるために、一度スクリプトに目を通したり、試しに実行してみることをオススメします。