<?php
session_start();

if (isset($_SESSION['email'])) {
  header("Location: admin/index.php");
  exit();
}


// for remember me button
if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
  $emailCookie = $_COOKIE['email'];
  $passCookie = $_COOKIE['password'];
} else {
  $emailCookie = "";
  $passCookie = "";
}
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>تسجيل الدخول</title>
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

    @media (min-width: 1400px) {
      nav {
        margin-bottom: 170px !important;
      }
    }
  </style>
</head>

<body>
  <div class="loginPage">

    <nav class="navbar navbar-expand-lg" style="margin-bottom: 40px;">
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
    <form action="./login.php" method="POST" class="loginForm" enctype="multipart/form-data">
      <h3 class="mb-5 text-center">تسجيل الدخول</h3>
      <?php
      if (isset($_SESSION['status'])) {
        echo '<div class="alert" style="text-align: center;">' . $_SESSION['status'] . '</div>';
        unset($_SESSION['status']);
      }
      ?>
      <div class="mb-4">
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $emailCookie ?>" aria-describedby="emailHelp" placeholder="البريد الالكتروني" />
      </div>
      <div>
        <input type="password" class="form-control" name="password" id="password" value="<?php echo $passCookie ?>" placeholder="كلمة السر" />
        <div class="group2">
          <i class="fa-solid fa-eye-slash showpass" onclick="showPass()"></i>
        </div>
      </div>
      <div class="linkks">
        <a href="#" class="forgetpass show-modal">هل نسيت كلمة السر؟</a>
        <p>
          <input type="checkbox" name="remember_me" style="accent-color: #7c4ab6" id=""> تذكرني
        </p>
      </div>
      <button type="submit" class="btn btn-primary mt-4" name="submit">تسجيل الدخول</button>
      <p class="create-acc">ليس لديك حساب؟ <a href="./signup.php">انشاء حساب</a></p>
    </form>
  </div>
  <div class="custom-shape-divider-top-1711922134">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
      <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
      <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
      <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
    </svg>
  </div>
  <section class="section">
    <span class="overlay"></span>
    <div class="modal-box">
      <h2>ادخل البريد الالكتروني</h2>
      <p>وقم بفحص بريدك لاسترجاع كلمة السر الخاصة بك</p>
      <form action="#" method="post">
        <input type="email" placeholder="البريد الالكتروني" name="recoveryemail" class="form-control" autofocus required>
        <span class="invalid mt-3 text-danger"></span>
        <div class="form-row">
          <button type="submit" class="btn btn-success" id="submit" name="send">ارسال</button>
          <button type="button" class="btn btn-danger cancel" onclick="cancelSend()">الغاء</button>
        </div>
      </form>
    </div>
  </section>
  <script>
    const section = document.querySelector("section"),
      overlay = document.querySelector(".overlay"),
      showModalBtn = document.querySelector(".show-modal");

    showModalBtn.addEventListener("click", () => section.classList.add("active"));
    overlay.addEventListener("click", () => section.classList.remove("active"));

    // validate email of forgot password
    document.querySelector(".modal-box .btn").onclick = function() {
      if (document.querySelector(".modal-box .form-control").value === '' || document.querySelector(".modal-box .form-control").value === null) {
        document.querySelector(".invalid").innerHTML = "الرجاء ادخال البريد الالكتروني";
      }
    }

    // show/hide password 

    function showPass() {
      const pwInput = document.querySelector(".loginForm #password");
      const showPwIcon = document.querySelector(".loginForm .showpass");
      if (pwInput.getAttribute("type") === 'password') {
        pwInput.setAttribute("type", "text");
        showPwIcon.classList.remove();
        showPwIcon.classList.add("fa-eye");
      } else {
        pwInput.setAttribute("type", "password");
        showPwIcon.classList.remove("fa-eye");
      }
    }
    // handle the cancel button 
    function cancelSend() {
      document.querySelector(".section").classList.remove("active");
    }

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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" async></script>
</body>

</html>

<?php
// send password to the email when the user enters the email 

include("./connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



//Load Composer's autoloader
require 'vendor/autoload.php';




require("./config.php");

function sendMail($email, $subject, $message)
{
  $mail = new PHPMailer(true);

  try {
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = MAILHOST;
    $mail->SMTPAuth = true;
    $mail->Username = USERNAME;
    $mail->Password = PASSWORD;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    // Email content
    $mail->setFrom(SENDFROM, SEND_FROM_NAME);
    $mail->addAddress($email);
    $mail->addReplyTo(REPLY_TO, REPLY_TO_NAME);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();
    return "Email sent";
  } catch (Exception $e) {
    return "Email not sent. Error: {$mail->ErrorInfo}";
  }
}

if (isset($_POST['send'])) {
  $email = $_POST["recoveryemail"];

  $sql = "SELECT password FROM users WHERE email = '$email'";
  $result = $database->query($sql);

  if ($result->num_rows > 0) {
    // Password found, send it to the user's email
    $row = $result->fetch_assoc();
    $password = $row["password"];

    $subject = "Password Recovery";
    $message = "Your password is: $password";

    $sendStatus = sendMail($email, $subject, $message);

    if ($sendStatus === "Email sent") {
      echo "<div class='showmessage'>تم ارسال الرسالة</div>";
    } else {
      echo "<div class='showmessage'>فشل في ارسال الرسالة! $sendStatus</div>";
    }
  } else {
    // Email address not found in the database
    echo "<div class='showmessage'>لا يوجد حساب بالايميل المدخل!</div>";
  }

  $database->close();
}
?>