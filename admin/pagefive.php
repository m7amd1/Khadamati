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
    <title>بلاغ عن تغير الحالة الاجتماعية</title>
    <link rel="stylesheet" href="../scss/p5.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@160..700&display=swap"
      rel="stylesheet"
    />
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
  <body  class="A4">
    <section class="mt-5">
      <div class="container">
        <div class="head">
          <div class="logo">
            دولة فلسطين <br />
            وزارة الداخلية
          </div>
          <div class="pic"></div>
          <div class="logo-en">
            state of palestine <br />
            ministry of interior
          </div>
        </div>
        <hr />
        <div class="title text-center" style="border: 2px solid black; width: fit-content; margin: 0 auto; padding: 0 60px;">
          <h2>بلاغ عن تغير الحالة الاجتماعية</h2>
        </div>
        <div class="flex">
          <div class="borderr">###</div>
          <div>زواج</div>
          <div class="borderr"></div>
          <div>طلاق</div>
        </div>
        <form action="./insertlog.php" method="post">
          <table class="table table-bordered" style="margin-top: 20px;">
            <thead>
              <tr>
                <th>البيانات</th>
                <th>بيانات الزوج</th>
                <th>بيانات الزوجه</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>رقم الهوية</td>
                <td><input type="text" name="nic"></td>
                <td><input type="text"></td>
              </tr>
              <tr>
                <td>الاسم الشخصي</td>
                <td><input type="text" name="full_name"></td>
                <td><input type="text"></td>
              </tr>
              <tr>
                <td>اسم الاب</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
              </tr>
              <tr>
                <td>اسم الجد</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
              </tr>
              <tr>
                <td>اسم العائلة</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
              </tr>
              <tr>
                <td>تاريخ الميلاد</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
              </tr>
              <tr>
                <td>الجنسية</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
              </tr>
              <tr>
                <td>العنوان</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
              </tr>
              <tr>
                <td>الديانة</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
              </tr>
              <tr>
                <td>الحالة الاجتماعية</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
              </tr>
              <tr>
                <td>رقم الخلوي</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
              </tr>
              <tr>
                <td>رقم وثيقة/زواج-طلاق</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
              </tr>
              <tr>
                <td>المكان الذي حدث فيه التغير</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
              </tr>
              <tr>
                <td>تاريخ التغير في الحالة الاجتماعية</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
              </tr>
            </tbody>
          </table>
          <div class="sicfour mt-4">
            <div>
              <p>____________________</p>
              <p>تاريخ التقديم</p>
            </div>
            <div>
              <p>____________________</p>
              <p>ختم وتوقيع الموظف المختص</p>
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
          <div class="button mt-4">
            <button type="submit" onclick="window.print();">معاينة</button>
          </div>
        </form>
      </div>
    </section>
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
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
      async
    ></script>
  </body>
</html>
