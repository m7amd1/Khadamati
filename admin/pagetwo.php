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
  <title>طلب شهادة خلو من السوابق</title>
  <link rel="stylesheet" href="../scss/p2.css">
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
    <div class="container-xxl">
      <div class="head">
        <div class="logo">دولة فلسطين <br> وزارة الداخلية</div>
        <div class="pic"><img src="../img/Palestine_authority_logo.jpg" draggable="false" alt=""></div>
        <div class="logo-en">
          state of palestine <br> ministry of interior
        </div>
      </div>
      <hr>
      <div class="mt-4 text-center">
        <h2>طلب شهادة خلو من السوابق</h2>
      </div>
      <p class="mt-5" style="font-size: 19px;">
        للاخ / المدير <input type="text" required class="input"> المحترم <br> تحية الوطن وبعد ...
      </p>
      <h5 class="mt-4">ارجو التكرم باعطائي شهادة خلو من السوابق</h5>
      <p class="p-none" style="margin-top: 48px;">
        ذلك لتقديمها الى: <input type="text" class="input" style="display: inline-block; width: 260px;">
      </p>
      <p class="mt-3">
        الغرض: <input type="text" class="input" style="width: 300px; display: inline-block;">
      </p>
      <h5 style="margin-top: 48px;">البيانات الشخصية لمقدم الطلب</h5>
      <hr class="title">
      <form action="insertlog.php" method="post">
        <div class="flexx" style="margin-top: 48px;">
          <div>
            الاسم الرباعي: <input type="text" class="input" name="full_name">
          </div>
          <div>
            رقم الهوية: <input type="text" class="input" name="nic">
          </div>
        </div>
        <div class="flexx sictwo mt-4">
          <div>
            العنوان الحالي: <input type="text" class="input">
          </div>
          <div>
            الشارع <input type="text" class="input">
          </div>
          <div>
            البناية <input type="text" class="input">
          </div>
        </div>
        <div class="flexx mt-4">
          <div>
            العنوان السابق <input type="text" class="input" style="width: 350px;">
          </div>
        </div>
        <div class="flexx mt-4">
          <div>
            البلد الاصلي <input type="text" class="input" style="width: 350px;">
          </div>
        </div>
        <div class="flexx mt-4">
          <div>
            الحالة الاجتماعية: <input type="text" class="input">
          </div>
          <div>
            عدد الاولاد: <input type="text" class="input">
          </div>
        </div>
        <div class="flexx mt-4">
          <div>
            المهنة: <input type="text" class="input">
          </div>
          <div>
            مكان العمل: <input type="text" class="input" style="width: 300px;">
          </div>
        </div>
        <div class="flexx mt-4">
          <div>
            المؤهل العلمي: <input type="text" class="input">
          </div>
          <div>
            هاتف/ جوال <input type="text" class="input">
          </div>
        </div>
        <hr style="border-width: 3px;" class="mt-4">
        <div class="flexx" style="justify-content: space-between;">
          <div>تحرير في</div>
          <div>توقيع مقدم الطلب</div>
        </div>
        <hr style="margin-top: 30px;">
        <div class="flexx" style="justify-content: space-between;">
          <div>الاستعمال الرسمي</div>
          <div class="flexx" style="flex-direction: column;align-items: flex-start; gap: 14px;">
            الاسم <input type="text" class="input">
            التوقيع <input type="text" class="input">
            ختم الدائرة
          </div>
        </div>
        <hr style="margin: 0;">
        <div class="flexx" style="justify-content: space-between;">
          <p>المرفقات</p>
          <p>
            صورة بطاقة الهوية <br> عدد 2 صورة شخصية
          </p>
          <p style="border: 1px solid black; padding: 50px 40px 5px;">طابع بقيمة (3) دنانير</p>
        </div>
        <input type="hidden" name="current_date" id="current_date" value="">
        <input type="hidden" name="page_title" id="page_title" value="">
        <div class="button mt-4">
          <button type="submit" onclick="window.print();">معاينة</button>
        </div>
      </form>
    </div>
    <p class="free">
      صورة <br> عدد 2
    </p>
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