<?php
session_start();
include("./connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require("./config.php");

function sendEmail_verify($email, $verify_token)
{
  $mail = new PHPMailer(true);
  try {
    $mail->isSMTP();
    $mail->Host = MAILHOST;
    $mail->SMTPAuth = true;
    $mail->Username = USERNAME;
    $mail->Password = PASSWORD;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom(SENDFROM, SEND_FROM_NAME);
    $mail->addAddress($email);
    $mail->addReplyTo(REPLY_TO, REPLY_TO_NAME);
    $mail->isHTML(true);
    $mail->Subject = "Email Verification From Khadamati";
    $mail->Body = "
            <h1>You Have Registered with Khadamati</h1>
            <h3>Verify Your Email Address To Login, With The Below Given Link</h3>
            <br/><br/>
            <a href='http://localhost/khadamati/verify_email.php?token=$verify_token'>Click Here</a>
        ";

    $mail->send();
    return "تم ارسال الرسالة";
  } catch (Exception $e) {
    return "لم يتم ارسال الرسالة خطا: {$mail->ErrorInfo}";
  }
}

if (isset($_POST['register'])) {
  $first_name = htmlspecialchars($_POST['first_name']);
  $last_name = htmlspecialchars($_POST['last_name']);
  $email = htmlspecialchars($_POST['email']);
  $password = $_POST['password'];
  $phone_number = htmlspecialchars($_POST['phone_number']);
  $city = htmlspecialchars($_POST['city']);
  $usertype = htmlspecialchars($_POST['usertype']);
  $verify_token = md5(rand());

  // Check if all fields are filled
  if (empty($first_name) || empty($last_name) || empty($email) || empty($_POST['password']) || empty($phone_number) || empty($city) || empty($usertype)) {
    $_SESSION['status'] = '<div class="alert alert-danger">يرجى ملء جميع الحقول</div>';
    header("Location: ./signup.php");
    exit();
  }

  // Check if the email already exists
  $check_email_query = $database->prepare("SELECT email FROM users WHERE email=? LIMIT 1");
  $check_email_query->bind_param("s", $email);
  $check_email_query->execute();
  $result = $check_email_query->get_result();

  if ($result->num_rows > 0) {
    $_SESSION['status'] = '<div class="alert alert-danger">الايميل معرف مسبقا</div>';
    header("Location: ./signup.php");
    exit();
  } else {

    $sql = $database->prepare("INSERT INTO users (first_name, last_name, email, password, phone_number, city, rule, verify_token) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $sql->bind_param("ssssssss", $first_name, $last_name, $email, $password, $phone_number, $city, $usertype, $verify_token);

    if ($sql->execute()) {
      sendEmail_verify($email, $verify_token);
      $_SESSION['status'] = '<div class="alert alert-success">تم انشاء الحساب الرجاء تاكيد بريدك الالكتروني</div>';
      header("Location: ./signup.php");
      exit();
    } else {
      $_SESSION['status'] = '<div class="alert alert-danger">حدث خطأ أثناء إنشاء الحساب. الرجاء المحاولة مرة أخرى</div>';
      header("Location: ./signup.php");
      exit();
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>انشاء حساب</title>
  <link rel="stylesheet" href="./scss/main.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@160..700&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon" />
  <style>
    /* Scrollbar */
    ::-webkit-scrollbar {
      width: 5px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #888;
      border-radius: 12px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #555;
    }

    @media (min-width: 992px) and (max-width: 1399px) {
      .navbar-brand img {
        width: 150px;
        height: auto;
      }

      .signupForm {
        max-width: 1000px;
        margin: 0 auto;
      }
    }

    .theme select.select {
      background-color: #0C0C1E;
      color: #FFF;
    }

    .theme select.select:focus {
      background-color: #0C0C1E;
      color: #FFF;
    }

    .theme select.select option {
      background-color: #0C0C1E;
      color: #FFF;
    }
  </style>
</head>

<body>
  <div class="formm">

    <nav class="navbar navbar-expand-lg" style="margin-bottom: 60px !important;">
      <div class="container nav">
        <a class="navbar-brand" href="index.html"><img src="./img/logo-dark.png" width="200" height="70" draggable="false" alt="خدماتي" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse links" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html">الرئيسية</a>
            </li>
            <li class="nav-item" style="margin-right: 50px;" onclick="toggleTheme()">
              <i class="fa-solid fa-moon moon" id="dark-Mode"></i>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <form action="" method="POST" class="signupForm" enctype="multipart/form-data">
      <h3 class="text-center">انشاء الحساب</h3>
      <?php
      if (isset($_SESSION['status'])) {
        echo '<div class="alert" style="text-align: center;">' . $_SESSION['status'] . '</div>';
        unset($_SESSION['status']);
      }
      ?>
      <div class="form-row mb-4">
        <div class="form-group col-md-6">
          <label for="first_name"><span class="required">*</span></label>
          <input type="text" class="form-control" name="first_name" placeholder="الاسم الاول">
        </div>
        <div class="form-group col-md-6">
          <input type="text" class="form-control" name="last_name" style="    margin-top: 30px;" placeholder="الاسم الاخير">
        </div>
      </div>

      <div class="form-row mb-4">
        <div class="form-group">
          <label for="email"><span class="required">*</span></label>
          <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="البريد الالكتروني">
        </div>
        <div class="form-group">
          <label for="password"><span class="required">*</span></label>
          <input type="password" class="form-control" id="password" name="password" min="8" placeholder="كلمة السر">
          <div class="group2">
            <i class="fa-solid fa-eye-slash showpass"></i>
          </div>
        </div>
      </div>
      <div class="form-row mb-4">
        <div class="form-group">
          <label for="phone_number"><span class="required">*</span></label>
          <input type="text" class="form-control" dir="rtl" name="phone_number" placeholder="رقم الهاتف">
        </div>
        <div class="form-group col-md-6" style="width: 100%;">
          <label for="city"><span class="required">*</span></label>
          <input type="text" class="form-control" id="inputCity" name="city" placeholder="المدينة">
        </div>
      </div>

      <div class="form-group col-md-4">
        <label for="inputState" class="mb-2" style="color: inherit; font-size:inherit"><span style="color: red;">*</span>حالة الحساب </label>
        <select id="inputState" name="usertype" class="form-control select" style="font-size: 14px;">
          <option selected>اختر حالة حسابك</option>
          <option value="d">وزارة الداخلية</option>
          <!-- <option value="k">وزارة الخارجية</option> -->
          <option value="m">المحاكم</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary mt-4" name="register">انشاء حساب</button>
      <p class="have-acc"> لديك حساب؟ <a href="./logingui.php">تسجيل الدخول</a></p>
    </form>
  </div>
  <div class="custom-shape-divider-top-1711922134">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
      <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
      <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
      <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
    </svg>
  </div>
  <script>
    // show/hide password 
    const pwInput = document.querySelector(".signupForm #password");
    const showPwIcon = document.querySelector(".signupForm .showpass");

    showPwIcon.addEventListener("click", () => {
      if (pwInput.getAttribute("type") === 'password') {
        pwInput.setAttribute("type", "text");
        showPwIcon.classList.remove();
        showPwIcon.classList.add("fa-eye");
      } else {
        pwInput.setAttribute("type", "password");
        showPwIcon.classList.remove("fa-eye");
      }
    });

    // toggle theme 
    let getMode = localStorage.getItem('mode');
    if (getMode && getMode === 'dark') {
      document.body.classList.toggle("theme");
    }

    function toggleTheme() {
      document.body.classList.toggle("theme");

      if (!document.body.classList.contains("theme")) {
        return localStorage.setItem("mode", "light");
      }
      localStorage.setItem("mode", "dark");

    };
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" async></script>
</body>

</html>