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
  <title>ابلاغ عن تغير العنوان</title>
  <link rel="stylesheet" href="../scss/p1.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@160..700&display=swap" rel="stylesheet" />
  <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon" />
  <style>
    /*------custom-scroll-bar - from w3schools.com------------------*/
    /* width */
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
  </style>
</head>

<body>
  <section class="mt-5">
    <div class="container-xl">
      <div class="head">
        <div class="logo">دولة فلسطين <br> وزارة الداخلية</div>
        <div class="pic"></div>
        <div class="logo-en">
          state of palestine <br> ministry of interior
        </div>
      </div>
      <hr>
      <div class="title text-center">
        <h2>ابلاغ عن تغيير العنوان</h2>
      </div>
      <form action="insertlog.php" method="post">
        <div class="sicone mt-5 text-center">
          <div>
            <span>رقم الهوية</span>
            <input type="text" name="nic" id="nic">
          </div>
          <div>
            <span class="mr">الاسم الشخصي</span>
            <input type="text" name="full_name" id="full_name">
          </div>
        </div>
        <div class="sictwo text-center">
          <table>
            <thead>
              <td>اسم الاب</td>
              <td>اسم الجد</td>
              <td>اسم العائلة</td>
              <td>تاريخ الميلاد</td>
              <td>اسم الام</td>
            </thead>
            <tbody>
              <tr>
                <td><input type="text" name="fathername"></td>
                <td><input type="text" name="grandfathername"></td>
                <td><input type="text" name="familyname"></td>
                <td><input type="text" name="dob"></td>
                <td><input type="text" name="mothername"></td>
              </tr>
              <tr>
                <td>رقم الخلوي</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
              </tr>
              <tr>
                <td>العنوان السابق</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
              </tr>
              <tr>
                <td>العنوان الجديد</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="sicthree mt-4 text-center">
          <h2 class="text-center">الابناء المراد تغيير عنوانهم</h2>
          <table class="mt-4">
            <thead>
              <td>الاسم</td>
            </thead>
            <tbody>
              <tr>
                <td><input type="text"></td>
              </tr>
              <tr>
                <td><input type="text"></td>
              </tr>
              <tr>
                <td><input type="text"></td>
              </tr>
              <tr>
                <td><input type="text"></td>
              </tr>
              <tr>
                <td><input type="text"></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="sicfour mt-4">
          <div>
            <p>____________________</p>
            <p>تاريخ التقديم</p>
          </div>
          <div>
            <p>____________________</p>
            <p>ختم وتوقيع الموظف</p>
          </div>
          <div class="signn">
            <p class="sign">البصمة</p>
            <p>توقيع مقدم الطلب</p>
          </div>
        </div>
        <div class="sicfive mt-4">
          طابع <br> 5 دنانير
        </div>
        <input type="hidden" name="current_date" id="current_date" value="">
        <input type="hidden" name="page_title" id="page_title" value="">
        <div class="button mt-2">
          <button type="submit" onclick="window.print();">معاينة</button>
        </div>
      </form>
    </div>
  </section>
  <script>
    document.getElementById('page_title').value = document.title;

    let currentDateInput = document.getElementById('current_date');
    let d = new Date();
    currentDateInput.value = d.toISOString().slice(0, 19).replace('T', ' ');

    // Update time display every second
    let currentTime = document.querySelector("#currentTime");
    setInterval(() => {
        let d = new Date();
        currentTime.innerHTML = d.toDateString();
    }, 1000);
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" async></script>
</body>

</html>