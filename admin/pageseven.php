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
  <title>طلب اخلاء سبيل</title>
  <link rel="stylesheet" href="../scss/p7.css">
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
        font-size: 1rem !important;
      }

      p.mzero {
        margin-top: 0.5rem !important;
      }

      .date {
        width: 100px !important;
      }
      .fssmall {
        font-size: 1rem !important;
      }
      .button {
        display: none;
      }
    }
  </style>
</head>

<body>
  <section class="mt-5">
    <div class="container-xl">
      <form action="insertlog.php" method="post">
        <div class="font-weight">
          <div class="flexx d-flex justify-content-between align-items-center">
            <div>
              <span>لدى محكمة</span>
              <input type="text" placeholder="......................." style="width: 80px !important;  font-size: 24px !important;">
              <span>الموقرة</span>
            </div>
            <div>
              <span>جنابة رقم</span>
              ( <input type="text" id="" placeholder="......................" style="width: 15px !important;  font-size: 24px !important;">
              /
              <input type="text" id="" placeholder="................" style="width: 60px !important;  font-size: 24px !important;">)
            </div>
          </div>
          <br>
          <span>المستدعي: </span>
          <input type="text" placeholder="................................................" style="width:290px !important;font-size:24px" name="full_name"> .
          <br>
          <span>رقم الهوية: </span>
          <input type="text" placeholder="................................................" style="width:120px !important;font-size:24px" name="nic"> .
          <br>
          <span>وكيلة المحامي:</span>
          <input type="text" placeholder="................................................" style="width:272px !important;font-size:24px">
          <span>و/او </span>
          <input type="text" placeholder="......................." style="font-size:24px">
          <span>/رام الله.</span>
          <br>
          <span>الموضوع: طلب اخلاء سبيل بالكفالة التي تراها المحكمة الموقرة وذلك عملا بالمادة <br> (132) من قانون الاجراءات الجزائية رقم (3) لسنة 2001.</span>
        </div>
        <p class="mt-5 text-center text-decoration-underline mzero">لائحة واسباب الطلب</p>
        <p>
          <span>1- المستدعي هو الموقوف على القضية المذكورة اعلاه منذ مدة تزيد عن</span>
          <br>
          <input type="text" placeholder="............." style="width:40px !important;font-size:24px">
        </p>
        <p>
          <span>2- حيث ان المستدعي شاب في مقتبل العمر و معيل لاسرة وفي ظل الظروف الصعبة <br> التي تمر بها عائلته حالها كحال باقي الشعب الفلسطيني وان بقائه موقوفا يلحق <br> الضرر بافراد اسرته حيث انه موقوف خمسة شهور ووضع اسرته يزداد سوءا يوما بعد الاخر.</span>
        </p>
        <p>
          <span>3- المستدعي انكر التهمة جملا وتفصيلا امام المحكمة الكريمة و النيابة العامة.</span>
        </p>
        <p>
          <span>4- ان المستدعي يقيم في رام الله اي انه داخل اختصاص محكمتكم الموقرة وذلك حسب <br> المادة 130 من قانون الاجراءات الجزائية رقم 3 لعام 2001 ساري المفعول.</span>
        </p>
        <p>
          <span>5- ان التوقيف ليس بعقوبة والاصل البراءة للانسان وان التوقيف هو اجراء احتياطي <br> تقوم به المحكمة وذلك من اجل الاستمرار في التحقيق و احالة النيابة العامة المتهم <br> لائحة و قرار اتهمام وهما تنتهي الغاية من التوقيف ووفقا لقانون الاجراءات الجزائية <br> ليس هناك ما يمنع من السير في اجراءات التحقيق والمتهم مخلى سبيله بالكفالة.</span>
        </p>
        <p>
          <span>6- ان المستدعي ليس من اصحاب السوابق الجنائية والتهم التي تهدد الامن والنظام العام <br> ولا يسما ان له مكان الاقامة ضمن اختصاص محكمتكم الكريمة.</span>
        </p>
        <p class="mb-5">
          <span>7- ان اخلاء سبيل المستدعي بالكفالة التي تراها محكمتكم الموقرة لا يعيق من اجراءات <br> سير العدالة بحيث ان المتهم مستعد لحضور كافة الجلسات المحاكمة.</span>
        </p>
        <p>
          <span class="text-decoration-underline">الطلب:- </span>
          ارجو من عدالتكم النظهر لهذا الطلب من منطلق الرحمة والعدالة حيث ان الرحمة <br> والعدالة اسمى من القوانين والتشريعات والعدل لسان وقلم وغاية وضمير القاضي فيما به <br> يحكم ذلك فانني التمس اخلاء سبيل المستدعي بالكفالة التي ترونها مناسبة.
        </p>
        <p class="text-center mzero">مع الاحترام</p>
        <div class="flexx d-flex justify-content-between align-items-center">
          <div>
            <span>تحريرا في : </span>
            <input type="date" class="date" style="font-weight: 500;font-size:24px; width: 170px !important;">
          </div>
          <div style="font-weight: 500;font-size:24px" class="fssmall">
            وكيل المستدعي
          </div>
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