<?php 
  session_start();

  if (!isset($_SESSION['authenticated'])) {
    $_SESSION['status'] = '<div class="alert alert-danger">الرجاء تسجيل الدخول للوصول للوحة التحكم</div>';
    header("Location: ./logingui.php");
    exit();

  }
?>