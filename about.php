<!DOCTYPE html>
<html>

<head>

  <title>College of Technology</title>
  <link rel="stylesheet" href="./css/about.css">


  <style>
    * {
      box-sizing: border-box
    }

    body {
      font-family: Verdana, sans-serif;
      margin: 0
    }

    .mySlides {
      display: none
    }

    img {
      vertical-align: middle;
    }

    /* Slideshow container */
    .slideshow-container {
      max-width: 40%;
      position: relative;
      margin: auto;
    }

    /* Next & previous buttons */
    .prev,
    .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 16px;
      margin-top: -22px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }

    /* Caption text */
    .text {
      color: #f2f2f2;
      font-size: 15px;
      padding: 8px 12px;
      position: absolute;
      bottom: 5px;
      width: 100%;
      text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
      cursor: pointer;
      height: 10px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }

    .active,
    .dot:hover {
      background-color: #717171;
    }

    /* Fading animation */
    .fade {
      animation-name: fade;
      animation-duration: 1.5s;
    }

    @keyframes fade {
      from {
        opacity: .4
      }

      to {
        opacity: 1
      }
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {

      .prev,
      .next,
      .text {
        font-size: 11px
      }
    }
  </style>

</head>

<body>
  <div>
    <header id="home">
      <div class="container_content">
        <div class="container">
          <nav>
            <center>
              <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>

                <li><a href="#sign_up">sign up</a>
                  <div class="sub_menu_1">
                    <ul>
                      <li class="hover_me"><a href="./student/registration.php">Students</a></li>
                    </ul>
                  </div>
                </li>

                <li><a href="#log_in">log in</a>
                  <div class="sub_menu_1">
                    <ul>
                      <li class="hover_me"><a href="./student/st_login.php">Students</a></li>
                      <li class="hover_me"><a href="./admin/login.php?usertype=ADMIN">Student Affairs</a></li>
                      <li class="hover_me"><a href="./doctors/login_doctor.php?usertype=Employee">Employees</a></li>
                    </ul>
                  </div>
                </li>

              </ul>
            </center>
          </nav>


        </div>
      </div>
  </div>
  </div>
  </header>
  </div>
  <div>
    <section class="about dark-theme">
      <div class="about-content">
        <h2>About Technology in Fayoum</h2>
        <p>The Faculty of Technology in Fayoum is one of the entities affiliated to Misr International University of Technology and includes several departments: the Department of Industrial Mechanism, the Department of Mechatronics, the Department of Information Technology, and the Department of Autotronics.</p>
        <p>aims to improve and develop the educational and information process in the college using strategies and methods supported by modern technology, especially computers and information technology. Where students are provided with education and knowledge using technology in a continuous manner regardless of place and time by providing educational materials and interactive lectures organized electronically that the student can review and learn from remotely. </p>

        <p class="p">If you want to know the results of your subjects or any resources that is avaliable for you go the HOM PAGE </p>
        <a href="index.php" class="btn" id="myP" onmousedown="mouseDown()" onmouseup="mouseUp()">CLICK HERE</a>
      </div>
      <div class="about-image">
        <div class="w3-content w3-section" style="max-width:500px">
          <img class="ss" src="./photos/mainpage.jpg" style="width:100%">
          <img class="ss" src="./photos/mainpage2.jpg" style="width:100%">
          <img class="ss" src="./photos/413820581_772088284934860_7542549890496126067_n.jpg" style="width:100%">
          <img class="ss" src="./photos/349861522_3469380366667268_341746155850906537_n.jpg" style="width:100%">
          <img class="ss" src="./photos/447778854_877162447760776_3507487747793626317_n.jpg" style="width:100%">
          <img class="ss" src="./photos/419062216_784918190318536_6981404554724415268_n.jpg" style="width:100%">
          <img class="ss" src="./photos/447780429_877162174427470_2862386599705762376_n.jpg" style="width:100%">
        </div>
      </div>
    </section>

  </div>
  <div>
    <section class="menu">
      <h2>Student Affairs at the Faculty</h2>
      <div class="menu-items">
        <div class="menu-item">
          <img src="./photos/413820581_772088284934860_7542549890496126067_n.jpg" alt="413820581_772088284934860_7542549890496126067_n.jpg">
          <h3>Providing the departments in college</h3>
          <p>Providing the departments of the college with all the information they need about the academic status of students from the available records and information and preparing a report thereon for the Dean.</p>
        </div>
        <div class="menu-item">
          <img src="./photos/mainpage3.jpg" alt="mainpage3.jpg">
          <h3>the academic programs in the college</h3>
          <p>it Work to introduce the students of the college to the academic programs in the college and the rules and laws of the university, as well as the study system and regulations.</p>
        </div>


        <div class="menu-item">
          <img src="./photos/349687351_821533012735316_1393993544823024646_n.jpg" alt="349687351_821533012735316_1393993544823024646_n.jpg">
          <h3>Contacting</h3>
          <p>Contact the Deanship of Student Affairs to inquire about everything related to students.</p>
          <p>Follow up the progress of the final exams in the college,and resultsof this in all its departments.</p>
        </div>
    </section>
  </div>

  <div>
    <div class="slideshow-container">
      <p class="G">THE GELLERY OF THE COLLEGE</p>
      <div class="mySlides fade">
        <div class="numbertext">1 / 5</div>
        <img src="./photos/447778854_877162447760776_3507487747793626317_n.jpg" style="width:100%">
      </div>

      <div class="mySlides fade">
        <div class="numbertext">2 / 5</div>
        <img src="./photos/447780429_877162174427470_2862386599705762376_n.jpg" style="width:100%">
      </div>

      <div class="mySlides fade">
        <div class="numbertext">3 / 5</div>
        <img src="./photos/349861522_3469380366667268_341746155850906537_n.jpg" style="width:100%">
      </div>

      <div class="mySlides fade">
        <div class="numbertext">4 / 5</div>
        <img src="./photos/432179160_821573379986350_4230216199741024924_n.jpg" style="width:100%">
      </div>


      <div class="mySlides fade">
        <div class="numbertext">5 / 5</div>
        <img src="./photos/412973326_772086798268342_1294101332611392856_n.jpg" style="width:100%">
      </div>
      <a class="prev" onclick="plusSlides(-1)">❮</a>
      <a class="next" onclick="plusSlides(1)">❯</a>

    </div>
    <br>

    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
      <span class="dot" onclick="currentSlide(4)"></span>
      <span class="dot" onclick="currentSlide(5)"></span>
    </div>

  </div>
  <script>
    function mouseDown() {
      document.getElementById("myP").style.color = "rgb(189, 126, 60)";
    }

    function mouseUp() {
      document.getElementById("myP").style.color = "blue";
    }

    var myIndex = 0;
    carousel();


    function carousel() {
      var i;
      var x = document.getElementsByClassName("ss");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      myIndex++;
      if (myIndex > x.length) {
        myIndex = 1
      }
      x[myIndex - 1].style.display = "block";
      setTimeout(carousel, 2000); // Change image every 2 seconds
    }






    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides fade");
      let dots = document.getElementsByClassName("dot");
      if (n > slides.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = slides.length
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
    }
  </script>


</body>

</html>