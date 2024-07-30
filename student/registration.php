<!DOCTYPE html>
<html dir="ltr">

<head>
   <meta charset="utf-8" />
   <title>new account</title>
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
         bottom: 60px;
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
         height: 480px;
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
   require('conn.php');
   include 'header.php';

   if (isset($_POST['username'])) {
      // ازله الخطوط المائله
      $username = stripslashes($_POST['username']);
      $username = mysqli_real_escape_string($conn, $username);

      $email    = stripslashes($_POST['email']);
      $email    = mysqli_real_escape_string($conn, $email);

      $password = stripslashes($_POST['password']);
      $password = mysqli_real_escape_string($conn, $password);

      $create_datetime = date("Y-m-d H:i:s");

      $id_school = stripslashes($_POST['id_school']);
      $id_school = mysqli_real_escape_string($conn, $id_school);



      $query = "SELECT `email` FROM `users` WHERE `email` = '$email'";
      $query2 = "SELECT `id_school` FROM `users` WHERE `id_school` = '$id_school'";
      $result = mysqli_query($conn, $query);
      $result2 = mysqli_query($conn, $query2);
      if (mysqli_num_rows($result) > 0 || (mysqli_num_rows($result2) > 0)) {
         if ((mysqli_num_rows($result) > 0)) {
            echo '<div class="alert alert-danger" style="width:100%;height:100% ;
			text-align: center;">This email address is already in use
            <p class="link">Click here<a href="registration.php">Click</a>To re-register </p>   
            </div>';
         }
         if ((mysqli_num_rows($result2) > 0)) {
            echo '<div class="alert alert-danger" style="width:100%;height:100% ;
            text-align: center;"> It cannot be  used id more than once
               <p class="link">Click here<a href="registration.php">Click</a>To re-register</p>   
               </div>';
         }
      } else {
         $check_school_query = "SELECT `id_school` FROM `info_student` WHERE `id_school` = '$id_school'";
         $check_school_result = mysqli_query($conn, $check_school_query);
         if (mysqli_num_rows($check_school_result) == 0) {
            echo '<div class="alert alert-danger" style="width:100%;height:100% ;
            text-align: center;">Student id does not exist
            <p class="link">Click here <a href="registration.php">Click </a>To re-register</p>   
            </div>';
         } else {

            $query    = "INSERT into `users` (username, password, email, create_datetime,id_school)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime','$id_school')";
            $result   = mysqli_query($conn, $query);
            if ($result) {
               echo "<div class='form alert alert-info'>
                  <h3 class='text-cnter'>successfully registered</h3><br/>
                  <p class='link text-cnter'> Click here<a href='st_login.php'>Register now</a></p>
                  </div>
                            <script>
                  setTimeout(function(){window.location.href='st_login.php';},4000)
                           </script>
                  ";
            } else {
               echo "<div class='form alert alert-info'>
                  <h3>Fields not found</h3><br/>
                  <p class='link'>Click here<a href='registration.php'></a>To re-register</p>
              
                  </div>";
            }
         }
      }
   } else {
   ?>





      <div class="container">
         <form action="" method="post" class="form" role="form">
            <h2>Registration</h2>

            <input type="text" name="username" placeholder="Username" class="box" required>
            <input type="email" autofocus="autofocus" name="email" id="login1" class="box" id="floatingPassword" placeholder="Email" required>
            <input type="password" name="password" placeholder="password" class="box" required>
            <input type="text" name="id_school" placeholder="id" class="box" required>
            <br>


            <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Register</button>

            <p class="link">Do you already have an account?<a href="st_login.php">Register now</a></p>
         </form>
         </main>

      <?php
   }
      ?>
</body>

</html>