<?php
require_once 'conn.php';
include_once "header.php";
session_start();
$type = $_GET['usertype'];

$sql = "SELECT * FROM doctor where usertype = '" . $type . "'";


$query = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($query)) {
   $image = $row['picture'];
}

if (isset($_POST['login'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];
   $query1 = "SELECT * FROM doctor where username='$username' 
	and password = '$password' and usertype = '$type'";

   $result   = mysqli_query($conn, $query1);
   $row  = mysqli_fetch_array($result);

   if (is_array($row)) {
      $_SESSION["id"] = $row['id'];
      if ($type == "Employee") {
         header('location:st_view.php');
      }
   } else {
      echo "<script>alert('Invalid username or password')</script>";
   }
}

?>

<style>
   body {
      background-color: beige;
   }

   img {
      height: 50px;
      width: 50px;
   }

   .container {
      display: flex;
      height: 500px;
      width: 800px;
      margin: auto;
      margin-top: 150px;
      justify-content: center;
      align-items: center;
      position: relative;
      bottom: 60px;
   }

   .form {
      background-color: rgb(12, 11, 9, 0.6);
      padding: 10px;
      border: 3px solid #CDA45E;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 420px;
      width: 420px;
      box-shadow: 0px 0px 20px rgba(0, 0, .2);
   }

   .form h2 {
      margin: 40px;
      font-size: 50px;
      color: #CDA45E;
   }

   .box {
      padding: 12px;
      width: 65%;
      margin: 5px;
      border: 2px solid #CDA45E;
      outline: none;
      border-radius: 20px;
      color: black;
      background-color: #CDA45E;
   }

   .btn {
      padding: 10px 20px;
      width: 30%;
      margin-top: 5px;
      margin-bottom: 15px;
      color: white;
      font-weight: bold;
      outline: none;
      border-radius: 20px;
      border: 2px solid #CDA45E;
      background-color: #CDA45E;
   }

   .btn:hover {
      cursor: pointer;
      background-image: linear-gradient(to right, #CDA45E, rgb(12, 11, 9, 0.6));
      color: white;
   }

   a {
      padding: 10px 20px;
      width: 20%;
      margin-top: 5px;
      margin-bottom: 15px;
      color: white;
      font-weight: bold;
      border: none;
      outline: none;
      border-radius: 30px;
      border: 2px solid #CDA45E;
      background-color: #CDA45E;
      text-align: center;
      text-decoration: none;
   }

   a:hover {
      cursor: pointer;
      background-image: linear-gradient(to right, #CDA45E, rgb(12, 11, 9, 0.6));
   }

   .link a {
      color: #CDA45E;
      font-size: 17px;
   }

   .link {
      color: white;
      font-size: 17px;
   }

   input::placeholder {
      color: white;
      text-align: left;
   }

   strong {
      color: white;
   }
</style>


<div class="container">
   <form action="" method="post" class="form" role="form">
      <h2>sign in</h2>
      <strong>(<?php echo $type ?>)</strong>
      <br>

      <input type="text" name="username" placeholder="username" class="box" required>
      <input type="password" name="password" placeholder="password" class="box" required>
      <br>
      <button name="login" class="btn" data-toggle="modal">
         Entry
      </button>

      <a href="logout.php">Exit</a>
   </form>

</div>

</body>