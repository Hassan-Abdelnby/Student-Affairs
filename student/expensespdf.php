<!DOCTYPE html>
<?php
require 'conn.php';
?>
<html dir="rtl">

<head>
    <title>امر التوريد</title>
    <link rel="icon" href="../logo/icon.jpg">

    <style>
        h1 {
            font-Size: 40px;
            text-align: center;


        }

        h2 {
            font-Size: 20px;
            margin-right: 200px;
            padding: 10px;

        }

        div {
            display: flex;
            justify-content: center;
            margin-right: 100px;
            padding: 5px;


        }

        div .h {
            display: flex;
            justify-content: space-between;
            margin: 100px;
            margin-top: -30px;
            font-size: 20px;
        }

        #id {
            margin-right: 400px;
        }

        .log {
            display: flex;
            justify-content: space-between;
            margin: 40px;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="log">
        <img src="../logo/mamitu.jpg">
        <h1> امر توريد </h1>
        <img src="../logo/ptecnology.jpg">

    </div>
    <h2>السيد المحاسب /............................................................................................</h2>

    <h2> برجاء تحصيل مبلغ /.........................................................................................</h2>

    <h2> من الطالب /.................................................................................................</h2>

    <h2 id="id"> المقيد بالفرقه(الاولي-الثانية-الثالثة- الرابعة) </h2>
    <h2> للعام الدراسي /............................................................................................</h2>
    <h2> وذلك نظير/.................................................................................................... </h2>
    <div>
        <h6 class="h"> شئون الطلاب <h6>
                <h6 class="h">مدير الكليه<h6>
    </div>
</body>
<script type="text/javascript">
    function PrintPage() {
        window.print();
    }

    window.addEventListener('DOMContentLoaded', (event) => {
        PrintPage()
        setTimeout(function() {
            window.close()
        }, 750)
    });
</script>

</html>