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
  <title>سند كفالة نظم مباشرة</title>
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

    input {
      border: 0;
      outline: 0;
      width: 100px !important;
      font-size: 24px !important;
      font-weight: 300;
    }

    @media print {
      .section {
        margin-top: 0 !important;
      }

      span,
      p,
      input {
        font-size: 15px !important;
      }

      p.mzero {
        margin-top: 1rem !important;
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
        <div class="text-start">
          <span>الرقم</span>
          <input type="text" style="width: 20px !important;">
          /
          <input type="text">
        </div>
        <br>
        <div class="text-start" style="margin-left: 10px;">
          <span>التاريخ</span>
          <input type="date" style="width: 140px !important;font-size:18px !important;">
        </div>
        <p class="text-center text-decoration-underline mzero" style="font-weight: bold;">سند كفالة نظم مباشرة</p>
        <p style="display: inline-block;" class="mzero">في يوم</p>
        <input type="text" placeholder="......................" style="width: 50px !important;">
        <span>الواقع في</span>
        <input type="text" placeholder="......................" style="width: 70px !important;">
        <span>من شهر</span>
        <input type="text" placeholder="......................" style="width: 20px !important;">
        <span>سنة </span>
        <input type="text" placeholder="......................" style="width: 50px !important;">
        <span>هجرية.</span>
        <br>
        <span>الموافق لليوم</span>
        <input type="text" placeholder="......................" style="width: 70px !important;">
        <span>من شهر</span>
        <input type="text" placeholder=".............." style="width: 20px !important;">
        <span>لسنة</span>
        <input type="text" placeholder=".............." style="width: 50px !important;">
        <span>ميلادية حضر لدي انا الكاتب العدل في دائرتي الرسمية <br> الكائنة في ضمن محاكم رام الله السيد / </span>
        <input type="text" placeholder="......................" style="width: 200px !important;">
        <span>من اهالي</span>
        <input type="text" placeholder="......................" style="width: 70px !important;">
        <span>والمعروف لي</span>
        <br>
        <span>بتعريف هويته الشخصية رقم ().</span>
        <br>
        <p class="mzero">وطلب مني ان انظم عليه سندا يتضمن ما هو ات :</p>
        <span>بما انه تقرر فرض كفالة عدلية لتخلية سبيل</span>
        <input type="text" name="full_name" placeholder=".............................." style="width: 200px !important;">
        <span>صاحب رقم الهوية</span>
        <input type="text" name="nic" placeholder="....................................." style="width: 120px !important;">
        <span>من اهالي</span>
        <input type="text" placeholder="......................" style="width: 70px !important;">
        <span>قضاء</span>
        <br>
        <span>رام الله بجرم</span>
        <input type="text" placeholder="......................">
        <span>في القضية الجزائية رقم </span>
        <input type="text" placeholder="..............." style="width: 20px !important;">
        /
        <input type="text" placeholder="..............." style="width: 20px !important;">
        <span>وبكفالة عدلية قدرها</span>
        <br>
        <span class="text-decoration-underline">خمسة الاف دينار اردني</span>
        <span>وذلك تامينا لحضوره في جميع المعاملات التحقيقية وادوار المحكمة وعند تنفيذ</span>
        <br>
        <span>الحكم فانه يكفل المتهم المذكور ويتعهد باحضاره عند كل طلب يصدر بحقه من قبل المحكمة في هذه القضية</span>
        <br>
        <span>وعند تنفيذ الحكم وان اي تاخر عن احضاره يدفع مبلغ خمسة الاف دينار اردني لصندوق محكمة بداية رام</span>
        <br>
        <span>الله بلا تعلل ودون حاجة الى انذار او محاكمة وبعكس ذلك يقبل ما يترتب عليه قانونا.</span>
        <br>
        <p class="mt-4">وعليه اقر واعترف واوافق على صحته تماما ووقعه الكفيل اعلاه بحضوري.</p>
        <p class="mt-4">وعليه صار تسجيله والتوقيع عليه منا جميعا.</p>
        <p class="mzero">توقيع الكفيل</p>
        <input type="text" placeholder=".........................">
        /
        <span>رام الله - </span>
        <input type="text" placeholder="...............">
        -
        <span>وسط البلد فانني اصادق على اقتداره وملائته حسب الاصول.</span>
        <br>
        <p class="mzero">5/6/2018</p>
        <span style="font-weight: bold;" class="mzero">
          تشهد غرفة تجارة وصناعة محافظة رام الله / البيرة بان السيد <input type="text" placeholder="..............." style="width: 200px !important;">
          تاجر مسجل لدى الغرفة التجارية تحت عضوية رقم
        </span>
        (
        <input type="text" style="font-weight: bold;width: 20px !important;" placeholder="..................">)
        <span style="font-weight: bold;">ومقتدر ماليا على كفالة</span>
        <input type="text" style="font-weight: bold;" placeholder="....................">
        <span style="font-weight: bold;">بمبلغ وقدره </span>
        (
        <input type="text" style="font-weight: bold;width: 70px !important;" placeholder="....................">)
        <span style="font-weight: bold;">دينار اردني لا غير بدون تحمل ادنى مسؤولية من قبلنا.</span>
        <p class="text-start" style="font-weight: bold;">رئيس الغرفة التجارية</p>
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