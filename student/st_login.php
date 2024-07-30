<?php
session_start();
?>

<!DOCTYPE html>
<html dir="ltr">

<head>
   <title>Login page</title>
   <link rel="icon" href="../logo/icon.jpg">
   <style>
      body {
         background-color: beige;
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
         bottom: 30px;
      }

      .form {
         /*display: flex;
         flex-direction: column;
         width: 50%;
         align-items: center;
         box-shadow: 0px 0px 10px rgba(0, 0, .2);
         border-radius: 10px;*/
         background-color: rgba(12, 11, 9, 0.6);
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
         width: 60%;
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
         border: none;
         outline: none;
         border-radius: 20px;
         border: 2px solid #CDA45E;
         background-color: #CDA45E;
      }

      .btn:hover {
         cursor: pointer;
         /*background-color: green;
         color: white;*/
      }

      .btn-reback {
         text-decoration: none;
         padding: 7px 15px;
         width: 20%;
         margin-top: 5px;
         margin-bottom: 15px;
         color: white;
         font-weight: bold;
         border: none;
         outline: none;
         border-radius: 20px;
         border: 2px solid #CDA45E;
         background-color: #CDA45E;
         text-align: center;
      }

      .btn-reback:hover {
         cursor: pointer;
         /*background-color: red;
         color: white;*/
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
   </style>
</head>

<body>
   <?php
   include './conn.php';
   include './header.php';

   if (isset($_POST['username'])) {
      $username = stripslashes($_POST['username']);
      $username = mysqli_real_escape_string($conn, $username);
      $password = stripslashes($_POST['password']);
      $password = mysqli_real_escape_string($conn, $password);

      $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn, $query));
      $rows = mysqli_num_rows($result);
      if ($rows == 1) {
         $_SESSION['username'] = $username;

         header("Location: st_services.php");
      } else {
         echo

         "<div class='form alert alert-info'>
                  <h3>The name or password is incorrect</h3><br/>
                  <p class='link'>Click here<a href='st_login.php'>Register again</a> </p>
                  </div>";
      }
   } else {
   ?>
      <div class="container">
         <form action="" method="post" class="form" role="form">
            <h2>Login</h2>

            <input type="text" name="username" placeholder="user name" class="box" required>
            <input type="password" name="password" placeholder="password" class="box" required>
            <br>
            <button name="login" class="btn" data-toggle="modal">
               Entry
            </button>

            <a href="logout.php" class="btn-reback">
               Exit
            </a>
            <p class="link">I do not have an account <a href="registration.php">Register a new member</a>
         </form>


      <?php
   }
      ?>
</body>

</html>