<?php
  session_start();
  include("./connection.php");

  if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $verify_query = "SELECT verify_token,verify_status from users where verify_token='$token' LIMIT 1";
    $verify_query_run = mysqli_query($database, $verify_query);

    if (mysqli_num_rows($verify_query_run) > 0) {

      $row = mysqli_fetch_array($verify_query_run);
      
      if ($row['verify_status'] == "0") {

        $clicked_token = $row['verify_token'];
        $update_query = "UPDATE users SET verify_status='1' where verify_token='$clicked_token' LIMIT 1";
        $update_query_run = mysqli_query($database, $update_query);

        if ($update_query_run) {
          $_SESSION['status'] = '<div class="alert alert-success">تم تفعيل الحساب الخاص بك</div>';
          header("Location: ./logingui.php");
          exit();
        } else {
          $_SESSION['status'] = '<div class="alert alert-danger">خطا في تفعيل البريد الالكتروني!</div>';
          header("Location: ./logingui.php");
          exit();
        }

      } else {
        $_SESSION['status'] = '<div class="alert alert-success">البريد الالكتروني مفعل الرجاء تسجيل الدخول</div>';
        header("Location: ./logingui.php");
        exit();
      }

    } else {
      $_SESSION['status'] = '<div class="alert alert-danger">هذا الكود غير موجود!</div>';
      header("Location: ./logingui.php");
      exit();
    }

  } else {
    $_SESSION['status'] = '<div class="alert alert-danger">غير مسموح</div>';
    header("Location: ./logingui.php");
    exit();
  }