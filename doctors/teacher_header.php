<!DOCTYPE html>
<html dir="rtl">

<head>
    <title>Doctor</title>
    <style>
        .logo {
            position: absolute;
            top: 5px;
            left: 50px;
        }

        nav ul {
            box-shadow: 0px 0px 3px rgba(0, 0, .2);
            display: inline-block;
            list-style-type: none;
            text-align: left;
            margin-top: 40px;
            position: absolute;
            right: 420px;
            top: 0px;
            border-radius: 50px;
            background-color: rgb(239, 232, 195);
            width: 40%;
        }

        nav ul li {
            display: inline-block;
            margin: 5px;
            text-align: center;
            padding-left: 0px;
            padding-top: 5px;
            padding-bottom: 10px;
            font-size: 21px;
        }

        nav li:hover {
            border-radius: 50px;
            padding: 10px;
        }

        nav ul li a {
            text-decoration: none;
            color: rgb(189, 126, 60);
            font-weight: bold;
            padding: 10px;
            text-align: center;
            position: relative;
            left: 30px;
        }

        nav ul a:hover {
            color: rgb(239, 232, 195);
            background-color: rgb(189, 126, 60);
            border-radius: 50px;
        }
    </style>

</head>

<body>
    <?php
    $id = $_SESSION['id'];


    $sql = "SELECT * FROM doctor where id = '$id'";

    $query = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($query)) {

        $lastname = $row['lastname'];
        $firstname = $row['firstname'];
    }
    ?>


    <!--<center>
        <span><?php echo "$firstname $lastname "; ?></span>
     
    </center>-->

    <header>
        <center><span style="font-weight: bold; font-size: 20px; color : gray;"><?php echo "Prof. $firstname $lastname "; ?></span></center>
        <nav>
            <h1 class="logo"><img src="LOGO.png" alt="logo" width="200" height="70"></h1>
            <ul id="menu">
            <li><a href="st_view.php">All Records</a></li>
            <li><a href="st_create_account.php">Add a new student</a></li>
                <li><a href="../about.php">about</a></li>
                <li><a href="logout.php">log out</a></li>
            </ul>
        </nav>
    </header>


</body>

</html>