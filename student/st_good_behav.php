<?php
include_once "header.php";
require_once 'conn.php';
?>
<head>
    <link rel="icon" href="../logo/icon.jpg">
    <style>
        h1 {
            padding: 40px;
            text-decoration: underline;
        }

        .log {

            display: flex;
            font-Size: 20px;
            text-align: center;
            justify-content: space-between;
            margin-top: 10px;
        }

        h2 {
            font-size: 20;
            margin-right: 200px;
            padding: 8px;
            line-height: 40px;
        }

        h3 {
            text-align: center;
            padding: 40px;
            font-Size: 20px;
        }

        #t {
            display: flex;
            justify-content: center;
            margin-right: 100px;
            padding: 60px;


        }

        div .h {
            display: flex;
            justify-content: space-between;
            margin: 150px;
            margin-top: -10px;

        }

        div .logo {
            position: absolute;
            top: 0px;
            left: 50px;
        }
        .pdf {
            position: absolute;
            left: 50%;
            text-decoration: none;
            padding: 15px 30px;
            border: 1px solid #CDA45E;
            border-radius: 7px;
            color: green;
            font-weight: bold;
            font-size: 15px;
            background-image: linear-gradient(to right, #CDA45E, rgb(12, 11, 9, 0.6));
            color: white;
            bottom: 120px;
        }

        .pdf:hover {
            text-decoration: none;
            padding: 15px 30px;
            border: 1px solid white;
            border-radius: 7px;
            background-color: #CDA45E;
            color: white;
            font-weight: bold;
            font-size: 15px;

        }
    </style>
</head>



<body dir="rtl">
    
<div class="log">
    <h1 class="logo"><img src="LOGO.png" alt="logo" width="200" height="70"></h1>
    <center>
        <h1> شهادة حسن السير والسلوك</h1>
    </center>
</div>
<h2> تشهد ادارةالكلية التكنولوجية بالفيوم بان الطالب /......
    ................<br>المقيد بالفرقة ...................-تخصص ............................<br> بحسن السير والسلوك اثناء العام الدراسي .
    ......................<br> وهذه شهادة منا بذالك وقد اعطي هذا البيان بناء علي طلبه لتقديم<br> الي جامعة
    ...................... دون ادني مسئولية علي ادارة الكلية .
    </h2>
        <h3> وتفضلوا بقبول فائق التحيه والاحترام. </h3>
        <div id="t">
            <h6 class="h"> شئون الطلاب </h6>
                    <h6 class="h">مدير الكليه</h6>
        </div>
        <a class="pdf" href="pdf_good_behav.php" role="button">PDF and print</a>

</body>


</html>