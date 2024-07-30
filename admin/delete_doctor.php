<?php
require_once 'conn.php';
include_once "header.php";

session_start();
if (!isset($_SESSION["id"]) || $_SESSION["id"] == '') {
    header('location: index.php');
    exit;
}

$id = $_GET['id'];

// Fetch doctor details
$query = "SELECT * FROM doctor WHERE id = '$id'";
$result = mysqli_query($conn, $query);
if (!$result || mysqli_num_rows($result) == 0) {
    echo "Doctor not found!";
    exit;
}

$row = mysqli_fetch_array($result);
$delfirstname = $row['firstname'];
$dellastname = $row['lastname'];
$delusername = $row['username'];
$delpicture = $row['picture'];

// If 'Yes' is clicked, delete related users, students, and doctor
if (isset($_POST['yes'])) {
    // Start transaction
    mysqli_begin_transaction($conn);

    try {
        // Delete users related to students under this doctor
        $query_delete_users = "DELETE users FROM users
                              JOIN info_student ON users.id_school = info_student.id_school
                              WHERE info_student.teacher_number = '$id'";
        $result_delete_users = mysqli_query($conn, $query_delete_users);
        if (!$result_delete_users) {
            throw new Exception("Error deleting users related to students: " . mysqli_error($conn));
        }

        // Delete students under this doctor
        $query_delete_students = "DELETE FROM info_student WHERE teacher_number = '$id'";
        $result_delete_students = mysqli_query($conn, $query_delete_students);
        if (!$result_delete_students) {
            throw new Exception("Error deleting students: " . mysqli_error($conn));
        }

        // Delete the doctor
        $query_delete_doctor = "DELETE FROM doctor WHERE id = '$id'";
        $result_delete_doctor = mysqli_query($conn, $query_delete_doctor);
        if (!$result_delete_doctor) {
            throw new Exception("Error deleting doctor: " . mysqli_error($conn));
        }

        // Commit transaction
        mysqli_commit($conn);
        
        echo "<script>alert('Doctor and related records deleted successfully.');</script>";
        echo "<script>window.location.href = 'doctor_view.php';</script>";
    } catch (Exception $e) {
        // Rollback transaction if any query fails
        mysqli_rollback($conn);
        echo "<script>alert('" . $e->getMessage() . "');</script>";
    }
}

if (isset($_POST['no'])) {
    echo '<script>window.location="doctor_view.php"</script>';
}
?>

<head>
    <link rel="icon" href="../logo/icon.jpg">
</head>
<style>
    body {
        background-color: beige;
    }

    form {
        border: 3px solid #CDA45E;
        width: 500px;
        height: 440px;
        position: relative;
        background-color:
            /*rgb(239, 232, 195)*/
            rgba(12, 11, 9, 0.6);
    }

    .image {
        border-radius: 50px;
        width: 20%;
        height: 120px;
        border: 2px double #CDA45E;
    }

    strong {
        font-size: 20px;
        color: white
    }

    h3 {
        color: #CDA45E;
    }

    .btn-yes {
        width: 20%;
        height: 40px;
        /*margin-top: 10px;
    padding: 10px;
    display: block;*/
        font-size: 20px;
        color: white;
        border: 2px solid white;
        border-radius: 10px;
        background-color: #CDA45E;
        position: relative;
        right: 100px;
        top: 30px;
    }

    .btn-yes:hover {
        /*width: 20%;
    height:40px;
    margin-top: 10px;
    padding: 10px;
    display: block;
    font-size: 20px;*/
        color: #CDA45E;
        border: 2px solid #CDA45E;
        border-radius: 10px;
        background-color: white;
        /*background-image: linear-gradient(to right, #00e676, #00c853);*/
        cursor: pointer;
    }

    .btn-no {
        width: 20%;
        height: 40px;
        /*padding: 10px;
    display: block;*/
        font-size: 20px;
        color: white;
        border: 2px solid white;
        border-radius: 10px;
        background-color: #CDA45E;
        position: relative;
        left: 80px;
        bottom: 10px;
    }

    .btn-no:hover {
        /*width: 5%;
    margin-top: 10px;
    padding: 10px;
    display: block;
    font-size: 20px;*/
        color: #CDA45E;
        border: 2px solid #CDA45E;
        border-radius: 10px;
        /*background-image: linear-gradient(to right, #ff1744, #d50000);*/
        background-color: white;
        cursor: pointer;
    }
</style>

<body>
    <?php include('admin_header.php'); ?>
    <center>
        <form action="" method="post">
            <br>
            <img class="image" src="../images/<?php echo "$delpicture"; ?>">
            <h3> Name : <?php echo "$delfirstname $dellastname"; ?></h3>
            <h3> Email : <?php echo "$delusername"; ?></h3>
            <strong>?Are you sure you want to delete</strong>
            <br>
            <input type="submit" name="yes" value="Yes" class="btn-yes">
            <br>
            <input type="submit" name="no" value="No" class="btn-no">
        </form>
    </center>
</body>
</html>
