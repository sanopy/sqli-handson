# Blind SQL Injection

## 対象アプリケーション

本項では [ログインページ](http://localhost:8080/login.php) に対して前述のログインバイパスとは別の攻撃を行います。

ログインバイパスは、別のユーザーに偽造してログインが可能でした。
ここでは、ログインページのみからDB中の任意の値を読み取る方法を解説します。

## ベースとなるアイディア

MySQLには [SUBSTRING関数](https://dev.mysql.com/doc/refman/5.6/ja/string-functions.html#function_substring) という、文字列の一部を切り出すことができる関数があります。
この関数をSQLインジェクションによってサーバー上で実行し、ログイン処理が成功するかを観測することで、1文字ずつDB中の値の特定を行います。

## 自動的にDBの値を取得

[blind_sql_injection_linear.py](https://github.com/sanopy/sqli-handson/blob/main/poc/blind_sql_injection_linear.py) は、先程説明したアイディアを用いて、DB中の特定の値を取得するスクリプトです。

以下のコマンドによって、実際にスクリプトを実行することができます。

```bash
$ python3 poc/blind_sql_injection_linear.py
```

## もっと効率よくDBの値を取得

先程の [blind_sql_injection_linear.py](https://github.com/sanopy/sqli-handson/blob/main/poc/blind_sql_injection_linear.py) は、線形探索によって1文字ずつ探索を行っていたため、やや非効率でした。そこで、二分探索によってより効率よく文字の探索を行うスクリプトが [blind_sql_injection_binary.py](https://github.com/sanopy/sqli-handson/blob/main/poc/blind_sql_injection_binary.py) になります。

以下のコマンドによって、実際にスクリプトを実行することができます。

```bash
$ python3 poc/blind_sql_injection_binary.py
```