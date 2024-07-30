<?php
require_once '../conn.php';

session_start();
// Configuration
$upload_dir = '../images/'; // directory to store uploaded files
$allowed_types = array('jpg', 'jpeg', 'png', 'gif'); // allowed file types

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the uploaded file
    $file = $_FILES['file'];
    $team_name = $_POST['team_name']; // Get the team name from the form
    $id_admin = $_SESSION['id'];
    // Check if the file is valid
   // Check if the team already has an image
   $check_query = "SELECT * FROM images WHERE team_name = '$team_name'";
   $result = mysqli_query($conn, $check_query);

   if (mysqli_num_rows($result) > 0) {
       $message = "An image already exists for this team. Please choose another team.";
   } else {
    if ($file['error'] == 0) {
        // Get the file extension
        $file_ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        // Check if the file type is allowed
        if (in_array($file_ext, $allowed_types)) {
            // Generate a unique file name
            $file_name = uniqid(). '.'. $file_ext;

            // Move the uploaded file to the upload directory
            if (move_uploaded_file($file['tmp_name'], $upload_dir. $file_name)) {
                // Insert the file name and team name into the database
                $query = "INSERT INTO images (image_name, team_name,id_admin) VALUES ('$file_name', '$team_name','$id_admin')";
                mysqli_query($conn, $query);

                $message =  "File uploaded successfully!";
            } else {
                $message =  "Error uploading file.";
            }
        } else {
            $message = "File type not allowed.";
        }
    } else {
        $message = "Error uploading file.";
    }
}
}
?>
<!--<head>
    <link rel="stylesheet" href="../css/admin/upload.css">
</head>-->
<?php include('admin_header.php'); ?>
<style>
    body{
        background-color:beige;
    }
    .container{
        justify-content: center;
        align-items: center;
        height: 280px;
        width: 800px;
        margin: auto;
        padding: 20px;
        margin-top: 150px;
        box-shadow: 0 15px 20px #ABB2B9;
        background-color: rgba(12,11,9,0.6);
        border: 3px solid #CDA45E;
        position: relative;
        bottom: 60px;
    }
    .input{
        justify-content: center;
        align-items: center;
        height: 40px;
        width: 330px;
        padding: 0 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        outline: none;
        color: white;
        background-color: #CDA45E;
        position: relative;
        top: 20px;
    }
    .container select{
        height: 40px;
        width: 330px;
        border-radius: 5px;
        border: 1px solid #ccc;
        outline: none;
        color: white;
        background-color: #CDA45E;
        position: relative;
        right: -40px;
        top: 30px;
        text-align: left;
    }
    .button-container button {
        width: 20%;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
        padding: 10px;
        display: flex;
        font-size: 20px;
        color: #fff;
        border: 1px solid white;
        border-radius: 5px;
        background-color: #CDA45E;
        position: relative;
        top: 60px;
        left: 280px;
        
    }
    .button-container button:hover {
        cursor: pointer;
    }
    h1{
        color: #CDA45E;
        text-align: center;
    }
    .message {
    text-align: center;
    margin-top: 20px;
    font-size: 25px;
    color: #333;
}
</style>

<!-- HTML form to upload files -->
<div class="container">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <h1>Upload Tables</h1>
    <input type="file" name="file" class="input">
    <select name="team_name">
        <option value="Team 1">The first year, Information Technology Department</option>
        <option value="Team 2">The second year, Information Technology Department</option>
        <option value="Team 3">The third year, Information Technology Department</option>
        <option value="Team 4">The fourth year, Information Technology Department</option>
    </select>
    <div class="button-container">
        <button name="submit" data-toggle="modal">Upload file</button>
    </div>
</form>
</div>
<?php if(isset($message)){
 echo "<div class = 'message'>$message</div>";
 }
 ?>