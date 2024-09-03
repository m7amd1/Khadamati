<?php
require_once("../login.php");

if (!isset($_SESSION['email'])) {
  header("Location: ../logingui.php");
  exit();
}
$user_email = $_SESSION['email'];

include("../connection.php");
$sql = "SELECT * FROM users WHERE email='$user_email' LIMIT 1";
$result = $database->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>قائمة المستخدمين</title>
  <link rel="stylesheet" href="../scss/log.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@160..700&display=swap" rel="stylesheet" />
  <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon" />
</head>
<body>
  <!-- SideBar -->
  <section id="sidebar">
    <a href="./index.php" class="brand">
      <img src="../img/dash-logo.jpg" draggable="false" width="80" alt="Khadamati" />
    </a>
    <ul class="side-menu top">
      <div id="home-link" class="d-flex justify-content-start align-items-center" style="gap: 20px;">
        <i class="fa-solid fa-house"></i>
        <a href="./index.php">الرئيسية</a>
      </div>
      <div id="forms-link" class="d-flex justify-content-start align-items-center" style="gap: 20px;">
        <i class="fa-brands fa-wpforms" style="width: 22.25px;height:19px"></i>
        <?php if ($user['rule'] == 'm') : ?>
          <a href="./forms-m.php">النماذج</a>
        <?php elseif ($user['rule'] == 'd') : ?>
          <a href="./forms-d.php">النماذج</a>
        <?php else : ?>
          <a href="./forms.php">النماذج</a>
        <?php endif; ?>
      </div>
      <div id="users-link" class="d-flex justify-content-start align-items-center" style="gap: 20px;">
        <i class="fa-solid fa-users"></i>
        <a href="./log.php">قائمة المستخدمين</a>
      </div>
    </ul>
  </section>
  <!-- SideBar -->

  <!-- CONTENT -->

  <section id="content">
    <!-- NAVBAR -->
    <div class="blur-background"></div>
    <nav>
      <nav style="--bs-breadcrumb-divider: '<';" aria-label="breadcrumb">
        <i class="fa-solid fa-bars"></i>
        <ol class="breadcrumb" dir="ltr" style="  margin: 0;">
          <li class="breadcrumb-item active" aria-current="page">قائمة المستخدمين</li>
          <li class="breadcrumb-item active" aria-current="page"><a href="./index.php">الرئيسية</a></li>
        </ol>
      </nav>
      <div class="support">
        <a target="_blank" href="https://wa.me/message/ATAVTANUE3KYP1">
          <span><i class="fa-brands fa-whatsapp"></i></span>
          <span>الدعم الفني</span>
        </a>
      </div>
      <div class="flex-btn">
        <div class="dmode" onclick="toggleTheme()">
          <i class="fa-solid fa-moon moon" id="dark-Mode"></i>
        </div>
        <div class="dropdown logout">
          <button class="btn dropdown-toggle circle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../img/accounte-profile.jpg" draggable="false" alt="" />
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./logout.php"><i class="fa-solid fa-right-from-bracket" style="margin-left: 8px;"></i> تسجيل الخروج</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
      <div class="content table-wrapper">
        <table class="table table-responsive">
          <thead class="thead-dark">
            <tr>
              
              <th scope="col">#</th>
              <th scope="col">الاسم</th>
              <th scope="col">رقم الهوية</th>
              <th scope="col">الخدمة المستخدمة</th>
              <th scope="col">التاريخ</th>
            </tr>
          </thead>
          <?php
          // Database Connection 
          include('../connection.php');

          // Display forms based on the user role
          if ($user['rule'] == 'd') {
            $sql = "SELECT full_name, nic, service_name, current_date FROM log WHERE service_name IN ('ابلاغ عن تغير العنوان', 'طلب شهادة خلو من السوابق', 'طلب الحصول على بطاقة الهوية', 'طلب استخراج شهادة الميلاد', 'بلاغ عن تغير الحالة الاجتماعية')";
          }  elseif ($user['rule'] == 'm') {
            $sql = "SELECT full_name, nic, service_name, current_date FROM log WHERE service_name IN ('سند كفالة شخصية', 'طلب اخلاء سبيل', 'تطابق اسم', 'سند كفالة نظم مباشرة')";
          }else {
            $sql = "SELECT * FROM log";
          }

          $result = $database->query($sql);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr><td>" . (isset($row["id"]) ? $row["id"] : '') . "</td><td>" . $row["full_name"] . "</td><td>" . $row["nic"] . "</td><td>" . $row["service_name"] . "</td><td>" . $row["current_date"] . "</td></tr>";
          }
            echo "</table>";
          } else {
            echo "<tr><td colspan='5'>لا يوجد بيانات لعرضها!</td></tr>";
          }
          $database->close();
          ?>
      </div>
    </main>
    <!-- MAIN -->
  </section>

  <!-- CONTENT -->
  <div class="custom-shape-divider-top-1711922134">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
      <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
      <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
      <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
    </svg>
  </div>
  <script>
    // Toggle Themes

    let getMode = localStorage.getItem("mode");
    if (getMode && getMode === "dark") {
      document.body.classList.toggle("theme");
      document.querySelector("#content main .table").classList.toggle("table-dark");
    }

    function toggleTheme() {
      document.body.classList.toggle("theme");
      document.querySelector("#content main .table").classList.toggle("table-dark");

      if (!document.body.classList.contains("theme")) {
        return localStorage.setItem("mode", "light");
      }
      localStorage.setItem("mode", "dark");
    }
    // TOGGLE SIDEBAR
    const menuBar = document.querySelector('#content nav .fa-bars');
    const sidebar = document.getElementById('sidebar');

    menuBar.addEventListener('click', function() {
      sidebar.classList.toggle('hide');
      handleIconLinks();
    });

    function handleIconLinks() {
      const homeLink = document.getElementById('home-link');
      const formsLink = document.getElementById('forms-link');
      const usersLink = document.getElementById('users-link');

      homeLink.addEventListener('click', () => {
        window.location.href = './index.php';
      });

      formsLink.addEventListener('click', () => {
        <?php if ($user['rule'] == 'm') : ?>
          window.location.href = './forms-m.php';
        <?php elseif ($user['rule'] == 'd') : ?>
          window.location.href = './forms-d.php';
        <?php else : ?>
          window.location.href = './forms.php';
        <?php endif; ?>
      });

      usersLink.addEventListener('click', () => {
        window.location.href = './log.php';
      });
    }

    // Call handleIconLinks on page load to ensure functionality
    window.onload = handleIconLinks;
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" async></script>
</body>

</html>