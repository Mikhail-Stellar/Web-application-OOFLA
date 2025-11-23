<?php
// server.php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation
  if (empty($username)) { array_push($errors, "Требуется логин"); }
  if (empty($email)) { array_push($errors, "Требуется электронная почта"); }
  if (empty($password_1)) { array_push($errors, "Требуется пароль"); }
  if ($password_1 != $password_2) {
        array_push($errors, "Пароли не совпадают");
  }

  // check if user exists
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) {
    if ($user['username'] === $username) {
      array_push($errors, "Логин уже существует");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Электронная почта уже существует");
    }
  }

  if (count($errors) == 0) {
        $password = md5($password_1);

        $query = "INSERT INTO users (username, email, password) 
                          VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Вы успешно авторизовались";
        header('location: oofla_mainreg.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
          array_push($errors, "Требуется логин");
    }
    if (empty($password)) {
          array_push($errors, "Требуется пароль");
    }
  
    if (count($errors) == 0) {
          $password = md5($password);
          $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
          $results = mysqli_query($db, $query);
          if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Вы успешно авторизовались";
            header('location: oofla_mainreg.php');
          }else {
                  array_push($errors, "Неверный логин или пароль");
          }
    }
}
?>