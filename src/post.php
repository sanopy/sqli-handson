<?php
$username = $_POST['username'];
$message  = $_POST['message'];

if (isset($username, $message)) {
  $db = new PDO('mysql:host=mysql;dbname=sqli', 'mysql', 'passw0rd');
  $query = "INSERT INTO posts (`username`, `message`) VALUE ('$username', '$message')";
  $db->query($query);
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
  <title>search</title>
</head>
<body>
  <div class="container my-5">
    <form method="post">
      <div class="row">
        <div class="col">
          <label for="usernameInput" class="form-label">username</label>
          <input type="text" class="form-control" id="usernameInput" name="username" placeholder="username">
        </div>
        <div class="col">
          <label for="messageInput" class="form-label">message</label>
          <input type="text" class="form-control" id="messageInput" name="message" placeholder="message">
        </div>
      </div>
      <div class="row">
        <div class="col my-3">
          <button class="w-100 btn btn-lg btn-primary" type="submit">投稿</button>
        </div>
      </div>
    </form>
  </div>
</body>
</html>