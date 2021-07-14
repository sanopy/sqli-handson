<?php
$id = $_POST['id'];
$pass = $_POST['password'];
$is_trial = isset($id, $pass);

if ($is_trial) {
  $db = new PDO('mysql:host=mysql;dbname=sqli', 'mysql', 'passw0rd');
  $query = "SELECT * FROM users WHERE username='$id' AND password='$pass'";
  $r = $db->query($query);
  $is_success = $r && $r->fetch();
}
?><!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="preload" as="style" href="/css/signin.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/signin.css">
  <title>login</title>
</head>
<body class="text-center">
  <?php if ($is_trial && $is_success): ?>
    <div class="container">
      <p>login success</p>
      <?php
      // do something...
      ?>
    </div>
  <?php elseif ($is_trial): ?>
    <div class="container">
      <p>login fail</p>
    </div>
  <?php else: ?>
    <main class="form-signin">
      <form method="post">
        <h1 class="h3 mb-3 fw-normal">サインインする</h1>
        <label for="inputId" class="visually-hidden">ID</label>
        <input type="text" id="inputId" name="id" class="form-control" placeholder="ID" required autofocus>
        <label for="inputPassword" class="visually-hidden">パスワード</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="パスワード" required>
        <button class="w-100 btn btn-lg btn-primary" type="submit">サインイン</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021 <a href="https://github.com/sanopy" class="text-dark">sanopy</a></p>
      </form>
    </main>
  <?php endif; ?>
</body>
</html>