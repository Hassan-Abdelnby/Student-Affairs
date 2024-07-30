<?php
require_once 'conn.php';
include_once "header.php";

session_start();
if (!isset($_SESSION["id"]) || $_SESSION["id"] == '') {
    header('location: index.php');
    exit;
}

$id = $_GET['id'];

// استعراض بيانات الطالب من جدول info_student
$query_student = "SELECT * FROM info_student WHERE id = '$id'";
$result_student = mysqli_query($conn, $query_student);
if (!$result_student || mysqli_num_rows($result_student) == 0) {
    echo "Student not found!";
    exit;
}

$row_student = mysqli_fetch_array($result_student);
$upfirstname = $row_student['firstname'];
$uplastname = $row_student['lastname'];
$uppicture = $row_student['picture'];
$id_school = $row_student['id_school'];

$query_delete_user = "DELETE FROM users WHERE id_school = '$id_school'";
mysqli_query($conn, $query_delete_user);
// حذف الطالب من جدول info_student
if (isset($_POST['yes'])) {
    $query_delete_student = "DELETE FROM info_student WHERE id = '$id'";
    mysqli_query($conn, $query_delete_student);

    // حذف الـ user المرتبط بالطالب من جدول users

?>
    <script>
        alert('The user has been deleted successfully');
        window.location = "st_view.php";
    </script>
<?php
}

if (isset($_POST['no'])) {
    echo '<script>window.location="st_view.php"</script>';
}
?>


<head>
    <style>
        body {
            background-color: beige;
        }

        h3 {
            margin-top: 30px;
            font-size: 30px;
            color: #CDA45E;
        }

        .form {
            background-color: rgb(12, 11, 9, 0.6);
            padding: 10px;
            border: 3px solid #CDA45E;
            height: 500px;
            width: 550px;
            box-shadow: 0px 0px 20px rgb(0, 0, .2);
            margin-top: 100px;
        }

        .name {
            font-size: 30px;
            color: #CDA45E;
            margin-bottom: 20px;
        }

        .photo {
            border-radius: 100px;
            margin-top: 10px;
            border: 2px solid #CDA45E;
        }

        .btn-yes {
            position: relative;
            right: 70px;
            width: 100px;
            margin-top: 10px;
            padding: 10px;
            display: block;
            font-size: 20px;
            color: white;
            border: 2px solid white;
            border-radius: 10px;
            background-color: #CDA45E;
        }

        .btn-yes:hover {
            width: 100px;
            margin-top: 10px;
            padding: 10px;
            display: block;
            font-size: 20px;
            color: white;
            border: none;
            border-radius: 10px;
            background-image: linear-gradient(to right, #CDA45E, rgb(12, 11, 9, 0.6));
            cursor: pointer;
        }

        .btn-no {
            position: relative;
            left: 60px;
            bottom: 65px;
            width: 100px;
            padding: 10px;
            display: block;
            font-size: 20px;
            color: white;
            border: 2px solid white;
            border-radius: 10px;
            background-color: #CDA45E;
        }

        .btn-no:hover {
            width: 100px;
            margin-top: 10px;
            padding: 10px;
            display: block;
            font-size: 20px;
            color: white;
            border: none;
            border-radius: 10px;
            background-image: linear-gradient(to right, #CDA45E, rgb(12, 11, 9, 0.6));
        }
    </style>

</head>

<body>
    <center>
        <?php include('teacher_header.php'); ?>
        <br>
        <div class="form">
            <center>
                <form action="" method="post">

                    <img src="../images/<?php echo htmlspecialchars($uppicture); ?>" style="width: 150px; height: 150px" class="photo">

                    <center>
                        <h3> Name</h3>
                        <strong class="name"><?php echo htmlspecialchars(" $upfirstname  $uplastname"); ?></strong>
                    </center>
                    <br><br>

                    <font style="font-size: 30px; color: white;"><strong> Are you Sure you want to delete 😦 ? </strong></font>
                    <br><br>

                    <input type="submit" name="yes" value="yes" class="btn-yes"><br>

                    <input type="submit" name="no" value="No" class="btn-no">
                </form>
            </center>
        </div>
    </center>
</body>

</html>