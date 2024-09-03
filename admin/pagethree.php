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
  <title>طلب الحصول على بطاقة الهوية</title>
  <link rel="stylesheet" href="../scss/p3.css">
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
    <div class="container containerr">
      <div class="head mb-4">
        <div class="logo">دولة فلسطين <br> وزارة الداخلية</div>
        <div class="pic"><img src="../img/Palestine_authority_logo.jpg" draggable="false" alt=""></div>
        <div class="logo-en">
          state of palestine <br> ministry of interior
        </div>
      </div>
      <form action="insertlog.php" method="post">
        <div class="borderr" style="border: 2px solid black;">
          <div class="title text-center">
            <h4>طلب الحصول على بطاقة الهوية</h4>
          </div>
          <div class="flexx mt-2">
            1 <p>نوع الهوية</p>
            <div class="check">
              <input type="checkbox" name="اولى" id=""> اولى
              <input type="checkbox" name="باليه" id=""> باليه
              <input type="checkbox" name="مفقودة" id=""> مفقودة
              <input type="checkbox" name="تجديد" id=""> تجديد بسبب تغير الحاله الاجتماعية
            </div>
          </div>
          <hr>
          <div class="flex2">
            2 <p>رقم الكونترول / البنكيس</p>
            <input type="text" name="" id="">
            <p>تملا بمعرفة الدائرة المختصة</p>
            <input type="text" name="" id="">
          </div>
          <hr>
          <div class="flex2 mt-4">

          </div>
          <hr>
          <div class="flex3">
            3 <p style="width: 136px;" class="one">رقم الهوية</p>
            <input type="text" name="nic" style="width: 300px;">
            <p class="name">4 الاسم الشخصي</p>
            <input type="text" name="full_name">
            <p style="width: 133px;" class="three">5 اسم الاب</p>
            <input type="text" name="fathername">
          </div>
          <hr>
          <div class="flex4">
            6 <p style="width: 135px;padding:10px 36px;" class="one">اسم الجد</p>
            <input type="text" name="" style="width: 300px;">
            <p style="width: 145px;" class="two">7 الاسم العائلة</p>
            <input type="text" name="" style="width: 200px;">
            <p class="empty three" style="width: 133px;">8</p>
            <p style="border: 0;"></p>
          </div>
          <hr>
          <div class="flex5">
            9 <p style="padding: 10px 40.5px; width:135px" class="one">اسم الام</p>
            <input type="text" name="" style="width: 300px;">
            <p style="width: 145px;" class="two">الجنس</p>
            <input type="text" name="" style="width: 200px;">
            <p style="width: 133px;" class="three">الديانة</p>
            <input type="text" name="">
          </div>
          <hr>
          <div class="flex5 flex5-2">
            12 <p style="width: 128px;padding:10px 23px;" class="one">تاريخ الميلاد</p>
            <input type="text" name="" style="width: 300px;">
            <p style="padding:10px 22px;width:145px" class="two">13ح/الاجتماعية</p>
            <input type="text" name="" style="width: 200px;">
            <p style="width: 133px;padding:10px 18px" class="three">14مكان الميلاد</p>
            <input type="text" name="">
          </div>
          <hr>
          <div class="flex5">
            15 <p>عنوان السكن الحالي</p>
            <input type="text" style="width: 400px;">
          </div>
          <hr>

          <div class="flex6" style="padding-top: 10px;">
            <div></div>
            <div></div>
            <div></div>
            <div>صورة ارشيف الطلب والختم</div>
            <div class="photo">
              <p>4 صور شخصية حديثة</p><br>
              <i class="fa-solid fa-arrow-right-long"></i>
            </div>
          </div>
          <p class="pv">اقر انا الموقع ادناه بصحة ما في هذا الطلب واتحمل المسؤولية الكامله عن اي خطا يظهر فيه</p>
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
            طابع <br> بقيمة () دنانير
          </div>
        </div>
        <input type="hidden" name="current_date" id="current_date" value="">
        <input type="hidden" name="page_title" id="page_title" value="">
        <div class="button mt-4">
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