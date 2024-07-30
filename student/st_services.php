<?php include "conn.php" ?>

<head>
    <link rel="icon" href="../logo/icon.jpg">
</head>
<style>
    body {
        background-color: white;
    }

    .text1 {
        font-size: 62px;
    }

    .text2 {
        box-shadow: 0px 0px 3px rgba(0, 0, .2);
        line-height: 50px;
        font-size: 20px;
        color: rgb(189, 126, 60);
        border-radius: 50px;
        border: 2px solid #CDA45E;
        width: 580px;
        font-weight: bold;
        background-color: rgb(239, 232, 195);
    }

    .text2 span {
        color: gray;
        font-weight: bold;
    }

    ul {
        box-shadow: 0px 0px 3px rgba(0, 0, .2);
        position: relative;
        /*background-color:rgba(12,11,9,0.6);*/
        background-color: rgb(239, 232, 195);
        display: flex;
        bottom: 30px;
        border-radius: 50px;
        margin-left: 325px;
        margin-right: 30px;
        top: 5px;
        width: 60%;
    }

    ul li {
        padding-left: 10px;
        text-align: center;
        list-style: none;
        line-height: 50px;
        width: 150px;
    }

    ul li a {
        color: rgb(189, 126, 60);
        /*color:white;*/
        font-size: 20px;
        text-decoration: none;
        font-weight: bold;
    }

    ul li a:hover {
        color: white;
        background-color: rgb(166, 121, 56);
        border-radius: 50px;
        padding: 5px;
    }

    .logo {
        position: absolute;
        top: 5px;
        left: 50px;
    }
</style>
</head>
<!--<h1>Student services</h1>-->

<div class="btn1">
    <nav>
        <h1 class="logo"><img src="LOGO.png" alt="logo" width="200" height="70"></h1>
        <ul>
            <li><a href="st_marks.php">Result</a></li>
            <li><a href="st_show.php">Tables</a></li>
            <li><a href="st_good_behav.php">Good behaviour</a></li>
            <li><a href="st_ma.php">Ordered Supply</a></li>
            <li><a href="../about.php">ِAbout</a></li>
            <li><a href="logout.php">Log out</a></li>
        </ul>
    </nav>
</div>
<center>
    <div class="text1">
        <p>😊 Welcome</p>
    </div>
</center>

<center>
    <div class="text2">
        <p> You can benefit from this page to <br>* display your results *<br>* obtain some documents quickly *<br> view academic schedules , or other services that benefit you at any time you want <br><span>---Enjoy Our Site---</span> </p>
    </div>
</center>


<?php include "header.php" ?>