<?php
require_once("../login.php");

if (!isset($_SESSION['email'])) {
  header("Location: ../logingui.php");
}

?>
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>النماذج</title>
  <link rel="stylesheet" href="../scss/forms.css" />
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
      <div class="d-flex justify-content-start align-items-center" style="gap: 20px;">
        <i class="fa-solid fa-house" id="home-icon"></i>
        <a href="./index.php" id="home-link">الرئيسية</a>
      </div>
      <div class="d-flex justify-content-start align-items-center" style="gap: 20px;">
        <i class="fa-brands fa-wpforms" id="forms-icon"></i>
        <a href="./forms.php" id="forms-link">النماذج</a>
      </div>
      <div class="d-flex justify-content-start align-items-center" style="gap: 20px;">
        <i class="fa-solid fa-users" id="users-icon"></i>
        <a href="./log.php" id="users-link">قائمة المستخدمين</a>
      </div>
    </ul>
  </section>
  <!-- SideBar -->


  <!-- CONTENT -->

  <section id="content">
    <div class="blur-background"></div>
    <!-- NAVBAR -->
    <nav>
      <nav style="--bs-breadcrumb-divider: '<';" aria-label="breadcrumb">
        <i class="fa-solid fa-bars"></i>
        <ol class="breadcrumb" dir="ltr" style="  margin: 0;">
          <li class="breadcrumb-item active" aria-current="page">النماذج</li>
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
      <div class="main mt-4">
        <div class="search-box">
          <div class="form-group has-search">
            <span class="fa fa-search form-control-feedback"></span>
            <input type="text" class="form-control" id="find" placeholder="ابحث عن اسم خدمة" onkeyup="search();">
          </div>
        </div>
        <div class="content">
          <div class="row row-gap-4">
            <div class="col-md-6 col-lg-4 mb-3 mb-sm-0">
              <a href="../admin/pageone.php" target="_plank">
                <div class="card">
                  <div class="card-body text-center">
                    <img src="../img/1.jpg" draggable="false" class="img" alt="">
                    <h5 class="card-title" title="ابلاغ عن تغيير العنوان">ابلاغ عن تغيير العنوان</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 col-lg-4 mr">
              <a href="../admin/pagetwo.php" target="_plank">
                <div class="card">
                  <div class="card-body text-center">
                    <img src="../img/5.jpg" draggable="false" class="img" alt="">
                    <h5 class="card-title" title="طلب شهادة خلو من السوابق">طلب شهادة خلو من السوابق</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 col-lg-4">
              <a href="../admin/pagethree.php" target="_plank">
                <div class="card">
                  <div class="card-body">
                    <img src="../img/3.jpg" draggable="false" class="img" alt="">
                    <h5 class="card-title" title="طلب الحصول على بطاقة الهوية">طلب الحصول على بطاقة هوية</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 col-lg-4">
              <a href="../admin/pagefour.php" target="_plank">
                <div class="card">
                  <div class="card-body">
                    <img src="../img/4.jpg" draggable="false" class="img" alt="">
                    <h5 class="card-title" title="طلب استخراج شهادة ميلاد">طلب استخراج شهادة ميلاد</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 col-lg-4">
              <a href="../admin/pagefive.php" target="_plank">
                <div class="card">
                  <div class="card-body">
                    <img src="../img/6.jpg" draggable="false" class="img" alt="">
                    <h5 class="card-title" title="ابلاغ عن تغيير الحالة الاجتماعية">بلاغ عن تغيير الحالة الاجتماعية</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 col-lg-4">
              <a href="../admin/pagesix.php" target="_plank">
                <div class="card">
                  <div class="card-body">
                    <img src="../img/10.jpg" draggable="false" class="img" alt="">
                    <h5 class="card-title" title="سند كفالة شخصية">سند كفالة شخصية</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 col-lg-4">
              <a href="../admin/pageseven.php" target="_plank">
                <div class="card">
                  <div class="card-body">
                    <img src="../img/8.jpg" draggable="false" class="img" alt="">
                    <h5 class="card-title" title="طلب اخلاء سبيل">طلب اخلاء سبيل</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 col-lg-4">
              <a href="../admin/pageeight.php" target="_plank">
                <div class="card">
                  <div class="card-body">
                    <img src="../img/7.jpg" draggable="false" class="img" alt="">
                    <h5 class="card-title" title="تطابق اسم">تطابق اسم</h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 col-lg-4">
              <a href="../admin/pagenine.php" target="_plank">
                <div class="card">
                  <div class="card-body">
                    <img src="../img/9.jpg" draggable="false" class="img" alt="">
                    <h5 class="card-title" title="سند كفالة نظم مباشرة">سند كفالة نظم مباشرة</h5>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
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
    // TOGGLE SIDEBAR
    const menuBar = document.querySelector('#content nav .fa-bars');
    const sidebar = document.getElementById('sidebar');

    menuBar.addEventListener('click', function() {
      sidebar.classList.toggle('hide');
    })

    document.getElementById('home-icon').addEventListener('click', function() {
      window.location.href = document.getElementById('home-link').href;
    });

    document.getElementById('forms-icon').addEventListener('click', function() {
      window.location.href = document.getElementById('forms-link').href;
    });

    document.getElementById('users-icon').addEventListener('click', function() {
      window.location.href = document.getElementById('users-link').href;
    });

    // Toggle Themes

    let getMode = localStorage.getItem("mode");
    if (getMode && getMode === "dark") {
      document.body.classList.toggle("theme");
    }

    function toggleTheme() {
      document.body.classList.toggle("theme");

      if (!document.body.classList.contains("theme")) {
        return localStorage.setItem("mode", "light");
      }
      localStorage.setItem("mode", "dark");
    }

    // Search items
    function search() {
      let searchInput = document.getElementById("find").value;
      let items = document.querySelectorAll('.content a');
      let serviceName = document.getElementsByTagName('h5');
      for (let i = 0; i <= serviceName.length; i++) {
        let a = items[i].getElementsByTagName('h5')[0];
        let value = a.innerHTML || a.innerText || a.textContent;
        if (value.indexOf(searchInput) > -1) {
          items[i].style.display = "";
        } else {
          items[i].style.display = "none";
        }
      }
    }

    // Disable back button functionality
    window.history.forward();
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" async></script>
</body>

</html>