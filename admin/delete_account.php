<?php
require_once 'conn.php';
include_once "header.php";

session_start();
if (!isset($_SESSION["id"]) || $_SESSION["id"] == '') {
    header('location: index.php');
    exit;
}

$id = $_GET['id'];

if ($id == 1) {
    echo '<script>alert("You are not authorized to delete this user because he is the admin")</script>';
    echo '<script>window.location="mang_accounts.php"</script>';
    exit;
}

$query = "SELECT * FROM admin_accounts WHERE id = '$id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    echo '<script>alert("User not found!"); window.location="mang_accounts.php";</script>';
    exit;
}

$row = mysqli_fetch_array($result);
$delfirstname = $row['firstname'];
$dellastname = $row['lastname'];
$delusername = $row['username'];
$delpicture = $row['picture'];

if (isset($_POST['yes'])) {
    // Start transaction
    mysqli_begin_transaction($conn);

    try {
        // Disable foreign key checks
        mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");

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
        $query_delete_doctor = "DELETE FROM doctor WHERE id_admin = '$id'";
        $result_delete_doctor = mysqli_query($conn, $query_delete_doctor);
        if (!$result_delete_doctor) {
            throw new Exception("Error deleting doctor: " . mysqli_error($conn));
        }
        
        // Delete the admin
        $query_delete_admin = "DELETE FROM admin_accounts WHERE id = '$id'";
        $result_delete_admin = mysqli_query($conn, $query_delete_admin);
        if (!$result_delete_admin) {
            throw new Exception("Error deleting admin: " . mysqli_error($conn));
        }

        // Enable foreign key checks
        mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");

        // Commit transaction
        mysqli_commit($conn);

        echo '<script>alert("Admin and related records deleted successfully."); window.location.href = "mang_accounts.php";</script>';
    } catch (Exception $e) {
        // Rollback transaction if any query fails
        mysqli_rollback($conn);

        // Enable foreign key checks
        mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");

        echo '<script>alert("' . $e->getMessage() . '");</script>';
    }
}

if (isset($_POST['no'])) {
    echo '<script>window.location="mang_accounts.php"</script>';
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
        background-color: rgba(12, 11, 9, 0.6);
    }

    .image {
        border-radius: 50px;
        width: 20%;
        height: 120px;
        border: 2px double #CDA45E;
    }

    h3 {
        color: #CDA45E;
    }

    strong {
        font-size: 20px;
        color: white;
    }

    .btn-yes {
        width: 20%;
        height: 40px;
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
        color: #CDA45E;
        border: 2px solid #CDA45E;
        border-radius: 10px;
        background-color: white;
        cursor: pointer;
    }

    .btn-no {
        width: 20%;
        height: 40px;
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
        color: #CDA45E;
        border: 2px solid #CDA45E;
        border-radius: 10px;
        background-color: white;
        cursor: pointer;
    }
</style>

<body>
    <?php include('admin_header.php'); ?>
    <center>
        <form action="" method="post">
            <br>
            <img class="image" src="../images/<?php echo $delpicture; ?>">
            <h3>Name: <?php echo "$delfirstname $dellastname"; ?></h3>
            <h3>Email: <?php echo $delusername; ?></h3>
            <strong>Are you sure you want to delete?</strong>
            <br>
            <input type="submit" name="yes" value="Yes" class="btn-yes">
            <br>
            <input type="submit" name="no" value="No" class="btn-no">
        </form>
    </center>
</body>
</html>
