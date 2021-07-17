# Time-Based Blind SQL Injection

- 先程のBlind SQL Injectionはページの応答が結果によって異なることを観測することで、文字を特定することができた
- http://localhost:8080/post.php はページの応答が結果によって異ならない挙動
- sleep関数を埋め込むことで、結果によってページの「応答時間」に差を作る
- 例えば、username入力欄に `', (SELECT IF(SUBSTRING((SELECT password FROM users WHERE id=1), 1, 1) = binary 'p', sleep(5), 0))) -- ` を入力すると、やけに応答時間が長いことがわかる