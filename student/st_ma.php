<?php
include_once "header.php";
require_once 'conn.php';
?>

<head>
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
            margin-top: -10px;

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

        .logo {
            position: absolute;
            top: 5px;
            left: 50px;
        }
    </style>
</head>
<body dir="rtl">
    
<div class="log">
    <h1 class="logo"><img src="LOGO.png" alt="logo" width="200" height="70"></h1>
    <h1> امر توريد </h1>
</div>

<h2>السيد المحاسب /............................................................................................</h2>

<h2> برجاء تحصيل مبلغ /.........................................................................................</h2>

<h2> من الطالب /.................................................................................................</h2>

<h2 id="id"> المقيد بالفرقه(الاولي-الثانية-الثالثة- الرابعة) </h2>
<h2> للعام الدراسي /............................................................................................</h2>
<h2> وذلك نظير/.................................................................................................... </h2>

<a class="pdf" href="expensespdf.php" role="button">PDF and print</a>
</body>