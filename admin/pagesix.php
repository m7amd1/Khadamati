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
  <title>سند كفالة شخصية</title>
  <link rel="stylesheet" href="../scss/p6.css">
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

    @media print {

      span,
      p,
      input {
        font-size: 20px !important;
      }

      .button {
        display: none;
      }
    }
  </style>
</head>

<body class="A4">
  <section class="mt-5">
    <div class="container-xl">
      <div class="title text-center">
        <h3>سند كفالة شخصية</h3>
      </div>
      <hr>
      <div class="title text-center mb-5">
        <h3>لدى محكمة صلح رام الله</h3>
      </div>
      <form action="insertlog.php" method="post">
        <span>انا الموقع اسمي ادناه : </span>
        <input type="text" name="full_name" id="" class="name" placeholder="..........................................." style="width:272px !important;font-size:24px">
        <span>حامل هوية رقم هوية رقم</span> <br>
        ( <input type="text" name="nic" id="" placeholder="........................................." style="width:117px !important;font-size:24px">)
        <span>من سكان</span>
        <input type="text" name="" id="" placeholder="....................................">
        <span>فانني اكفل المتهم</span> <br>
        ( <input type="text" class="name" id="" placeholder="..................................................." style="width:272px !important;font-size:24px">)
        <span>حامل هوية رقم</span>
        ( <input type="text" id="" placeholder="...................................." style="width:117px !important;font-size:24px">)
        <span>في قضية <br> صلح جزاء رقم</span>
        ( <input type="text" id="" placeholder="......................" style="width:20px !important;font-size:24px">
        /
        <input type="text" id="" placeholder="..........." style="width:60px !important;font-size:24px">)
        <span>امام محكمة صلح و/او الجهات <br> المختصة ولدى محاكم رام الله وعند الطلب والمثول امام اية جهة ودائرة</span> <br>
        <span>مختصة تتعلق بالقضية اعلاه وفي حالة تخلفه عن ذلك اغرم بمبلغ</span> <br>
        <span>(10000) دينار اردني ادفعها لصندوق المحكمة الموقرة وعليه اوقع</span> <br>
        <span>حسب الاصول</span> <br>
        <p class="mt-4">تحريرا في : <input type="text"></p>
        <p class="text-start mt-5">التوقيع</p>
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