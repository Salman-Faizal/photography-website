<?php
  include('db-connect.php');

  // login function code
  session_start(); // Starting the session

  if (isset($_POST['btn-login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $stmt = $con->prepare("SELECT * FROM tbl_login WHERE email=? AND password=?");
    $stmt->bind_param("ss", $email, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        header("Location: ../dashboard.html");
        exit();
    } else {
        // Redirecting with error message in URL
        header("Location: ../login-pg.html?error=1");
        exit();
    }
  }
?>