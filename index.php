<?php
require_once 'conn.php';
include_once "header.php";
?>

<style>
  header {
    background-image: url('./photos/college.jpg');
    background-size: cover;
  }

  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }

  .LOGO {
    text-align: right;
  }

  #menu {
    position: fixed;
    background-color: rgb(239, 232, 195);
    display: flex;
    border-radius: 50px;
    top: 15px;
  }

  header ul li {
    padding-left: 10px;
    text-align: center;
    list-style: none;
    line-height: 50px;
    width: 150px;
  }

  header ul li a {
    color: rgb(189, 126, 60);
    font-size: 20px;
    text-decoration: none;
    font-weight: bold;
  }

  header ul li a:hover {
    color: white;
    background-color: rgb(166, 121, 56);
    border-radius: 50px;
    padding: 15px;
  }

  .sub_menu_1 {
    display: none;
  }

  header ul li:hover .sub_menu_1 {
    display: block;
    margin-left: -20px;
    position: absolute;
    top: 42px
  }

  header ul li:hover .sub_menu_1 ul {
    display: block;
    margin: 10px;
    border-radius: 7px;
    margin-top: 10px;
    padding: 3px;
    background-color: rgb(239, 232, 195);
  }

  header ul li:hover .sub_menu_1 ul li {
    width: 150px;
    padding: 5px;
    border-radius: 5px;
    text-align: center;
    border-bottom: 2px solid snow;
  }

  header ul li:hover .sub_menu_1 ul li a {
    color: rgb(189, 126, 60);
    font-size: 17px;
  }

  header ul li:hover .sub_menu_1 ul li a:hover {
    color: rgb(239, 232, 195);
    background-color: rgb(189, 126, 60);
    padding: 10px;
  }


  .container {
    max-width: 80%;
    margin: auto;
  }

  .grid {
    display: grid;
    grid-template-columns: repeat(3, auto);
    grid-column-gap: 40px;
    grid-row-gap: 40px;
  }

  header .container_content {
    background-color: rgba(0, 0, 0, 0.4);
    height: 100vh;
  }

  header .home {
    margin-top: 20%;
    text-align: center;
    color: white;
  }

  header .home h1 {
    font-size: 100px;
    color: rgb(239, 232, 195);
    font-weight: bold;
  }

  header .home .item {
    margin-top: 10%;
    text-align: left;
  }

  header .home .item a {
    font-size: 20px;
    color: white;
  }

  header .home .item .item_box {
    background: rgb(166, 121, 56);
    padding: 40px;
    border-radius: 5px;
    transition: 0.5s;
  }


  header .home .item p {
    font-size: 20px;
    line-height: 35px;
    margin-top: 20px;
  }

  header .home .item .text {
    margin-left: 20px;
  }


  header .home .item .item_box:hover {
    background: rgb(239, 232, 195);
    transform: translateY(-10px);
    color: rgb(189, 126, 60);
  }

  header .home .item .item_box:hover a {
    color: black;
  }

  header .home .item .item_box:hover img {
    background-color: rgb(239, 232, 195);
  }

  @media only screen and (max-width: 800px) {
    .grid {
      grid-template-columns: repeat(1, 1fr);
    }
  }
</style>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>College of Technology</title>
  <link rel="stylesheet" href="..//css/home.css">
</head>

<body>
  <header id="home">
    <div class="container_content">
      <div class="container">
        <nav>
          <center>
            <ul id="menu">
              <!--<li><a href="#photo">Photo</a></li>-->
              <li><a href="index.php">Home</a></li>

              <li><a href="#sign_up">sign up</a>
                <div class="sub_menu_1">
                  <ul>
                    <li class="hover_me"><a href="student/registration.php">Students</a></li>
                  </ul>
                </div>
              </li>

              <li><a href="#log_in">log in</a>
                <div class="sub_menu_1">
                  <ul>
                    <li class="hover_me"><a href="student/st_login.php">Students</a></li>
                    <li class="hover_me"><a href="./admin/login.php?usertype=ADMIN">Student Affairs</a></li>
                    <li class="hover_me"><a href="./doctors/login_doctor.php?usertype=Employee">Employees</a></li>
                  </ul>
                </div>
              </li>
              <li><a href="about.php">About</a></li>

            </ul>
          </center>
          <h1 class="LOGO"><img src="photos/LOGO.png" alt="logo" width="150" height="80"></h1>
        </nav>

        <div class="home">
          <h1>College Of Technology</h1>
          <div class="item grid">
            <div class="item_box flex">
              <img width="50" height="50" src="https://img.icons8.com/ios-filled/50/admin-settings-male.png" alt="admin-settings-male" />
              <div class="text">
              <a href="./admin/login.php?usertype=ADMIN">Student Affairs</a>
                <p>The Student Affairs office is responsible for everything related to the students, including
                  supervising the admission of new and transferring students to the college, among other
                  responsibilities.</p>
              </div>
            </div>


            <div class="item_box flex ">
              <img width="64" height="64" src="https://img.icons8.com/wired/64/students.png" alt="students" />
              <div class="text">
                <a href="./student/st_login.php">The students</a>
                <p>Here are the student lists for all programs as well as the results and other activities.</p>
              </div>
            </div>


            <div class="item_box flex">
              <img width="50" height="50" src="https://img.icons8.com/ios-filled/50/podium-with-speaker.png" alt="podium-with-speaker" />
              <div class="text">
              <a href="./doctors/login_doctor.php?usertype=Employee">Employee</a>
                <p>Here, the Employee or the teaching assistant can see the students registered in the course and other
                  activities.</p>
              </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </header>
  </div>

</body>

</html>