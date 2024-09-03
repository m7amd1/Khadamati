<?php
session_start();


if (isset($_POST['submit'])) {
  include('./connection.php');

  if (!empty(trim($_POST['email'])) && !empty(trim($_POST['password']))) {
    // Prepare the SQL statement with placeholders
    $query = "SELECT * FROM users WHERE email=? AND password=? LIMIT 1";

    $stmt = mysqli_stmt_init($database);
    if (mysqli_stmt_prepare($stmt, $query)) {
      mysqli_stmt_bind_param($stmt, "ss", $email, $password);

      $email = trim($_POST['email']);
      $password = trim($_POST['password']);

      if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_array($result);
          if ($row['verify_status'] == "1") {
            // Set cookies before redirection
            if (isset($_POST['remember_me'])) {
              setcookie('email', $email, time() + (30 * 24 * 60 * 60)); // expire date 1 month
              setcookie('password', $password, time() + (30 * 24 * 60 * 60));
            } else {
              setcookie('email', '', time() - (30 * 24 * 60 * 60));
              setcookie('password', '', time() - (30 * 24 * 60 * 60));
            }
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['rule'];

            header("Location: ./admin/index.php");
            exit();
          } else {
            $_SESSION['status'] = '<div class="alert alert-danger">الرجاء تفعيل بريدك الالكتروني لتسجيل الدخول</div>';
            header("Location: ./logingui.php");
            exit();
          }
        } else {
          $_SESSION['status'] = '<div class="alert alert-danger">الرجاء التاكد من البريد الالكتروني وكلمة المرور</div>';
          header("Location: ./logingui.php");
          exit();
        }
      } else {
        // Handle execution error
        $_SESSION['status'] = '<div class="alert alert-danger">حدث خطأ أثناء تسجيل الدخول. الرجاء المحاولة مرة أخرى لاحقًا</div>';
        header("Location: ./logingui.php");
        exit();
      }
    } else {
      // Handle statement preparation error
      $_SESSION['status'] = '<div class="alert alert-danger">حدث خطأ أثناء تسجيل الدخول. الرجاء المحاولة مرة أخرى لاحقًا</div>';
      header("Location: ./logingui.php");
      exit();
    }
  } else {
    $_SESSION['status'] = '<div class="alert alert-danger">الرجاء ملء جميع الحقول</div>';
    header("Location: ./logingui.php");
    exit();
  }

  $database->close();
}
