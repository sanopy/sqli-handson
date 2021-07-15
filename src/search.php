<?php
$username  = $_GET['username'] ?? '';
$email     = $_GET['email'] ?? '';
$firstname = $_GET['first_name'] ?? '';
$lastname  = $_GET['last_name'] ?? '';

$db = new PDO('mysql:host=mysql;dbname=sqli', 'mysql', 'passw0rd');
$query = "SELECT * FROM users WHERE username LIKE '%$username%' AND email LIKE '%$email%' AND first_name LIKE '%$firstname%' AND last_name LIKE '%$lastname%'";
$r = $db->query($query);
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
    <form method="get">
      <div class="row">
        <div class="col">
          <label for="usernameInput" class="form-label">username</label>
          <input type="text" class="form-control" id="usernameInput" name="username" placeholder="admin" value="<?php echo htmlspecialchars($_GET['username'] ?? ''); ?>">
        </div>
        <div class="col">
          <label for="emailInput" class="form-label">email</label>
          <input type="text" class="form-control" id="emailInput" name="email" placeholder="admin@example.com" value="<?php echo htmlspecialchars($_GET['email'] ?? ''); ?>">
        </div>
        <div class="col">
          <label for="firstNameInput" class="form-label">first name</label>
          <input type="text" class="form-control" id="firstNameInput" name="first_name" placeholder="Alan" value="<?php echo htmlspecialchars($_GET['first_name'] ?? ''); ?>">
        </div>
        <div class="col">
          <label for="lastNameInput" class="form-label">last name</label>
          <input type="text" class="form-control" id="lastNameInput" name="last_name" placeholder="Turing" value="<?php echo htmlspecialchars($_GET['last_name'] ?? ''); ?>">
        </div>
      </div>
      <div class="row">
        <div class="col my-3">
          <button class="w-100 btn btn-lg btn-primary" type="submit">検索</button>
        </div>
      </div>
    </form>
  </div>

  <div class="container my-5">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">username</th>
          <th scope="col">email</th>
          <th scope="col">first name</th>
          <th scope="col">last name</th>
          <th scope="col">created at</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($r && $user = $r->fetch()): ?>
          <tr>
            <th scope="row"><?php echo $user['username']; ?></th>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['first_name']; ?></td>
            <td><?php echo $user['last_name']; ?></td>
            <td><?php echo $user['created_at']; ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>