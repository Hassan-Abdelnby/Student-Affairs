<head>
    <link rel="icon" href="../logo/icon.jpg">

    <style>
        .logo {
            position: absolute;
            top: 5px;
            left: 50px;
        }

        ul {
            position: relative;
            /*background-color:rgba(12,11,9,0.6);*/
            background-color: rgb(239, 232, 195);
            display: flex;
            bottom: 30px;
            border-radius: 50px;
            margin-left: 300px;
            margin-right: 20px;
            border: 1px solid rgba(12, 11, 9, 0.6);
            box-shadow: 0px 0px 3px rgba(0, 0, 0.2);
            width: 60%;
            /*top:15px;*/

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
            font-size: 16px;
            text-decoration: none;
            font-weight: bold;
        }

        ul li a:hover {
            color: white;
            background-color: rgb(166, 121, 56);
            border-radius: 50px;
            padding: 15px;
        }
    </style>
</head>

<?php
include_once "header.php";
?>
<br>
<center>
    <div class="BtnS">
        <nav>
            <h1 class="logo"><img src="LOGO.png" alt="logo" width="200" height="70"></h1>
            <ul>
               
            <li><a href="mang_accounts.php">All user</a></li>
                <li><a href="create_account.php">New Employee</a></li>
                <li><a href="doctor_view.php">View Employee</a></li>
                <li><a href="upload.php">Upload File</a></li>
                <li><a href="../about.php">About</a></li>
                <li><a href="logout.php">sign out</a></li>
            </ul>
        </nav>
    </div>
</center>