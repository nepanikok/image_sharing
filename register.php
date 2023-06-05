<!DOCTYPE html>
<html lang="lt">

<head>
  <title>Register</title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, intial-scale=1.0">
</head>

<body>
  <form action="" method="post">
    <label for="name">Username:</label><br>
    <input type="text" name="nickname"><br>
    <label for="password">Password:</label><br>
    <input type="password" name="password1"><br><br>
    <label for="password">Retype password:</label><br>
    <input type="password" name="password2"><br><br>
    <input type="submit" name="submit" value="Continue"> <input type="reset" value="Delete" />
  </form>

  <?php
  require_once 'files/config.php';
  $username = "";

  $errors = array();


  if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['nickname']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password2']);
    if (empty($username)) {
      array_push($errors, "Username is required");
    }
    if (empty($password_1)) {
      array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
      array_push($errors, "The two passwords do not match");
      echo "Klaida";
    }
    $user_check_query = "SELECT * FROM user WHERE nickname='$username' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
      if ($user['nickname'] === $username) {
        array_push($errors, "Username already exists");
        echo "Klaida";
      }
    }
    if (count($errors) == 0) {
      $password = $password_1;

      $query = "INSERT INTO user (ID, nickname, password) 
  			  VALUES(NULL, '$username', '$password')";
      mysqli_query($conn, $query);
      $_SESSION["name"] = $username;
      header('location: index.php');
    }
  }
  ?>
</body>

</html>