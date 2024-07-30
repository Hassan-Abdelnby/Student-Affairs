<head>
    <link rel="icon" href="../logo/icon.jpg">
    <title>Studen Affairs</title>
</head>
<style>
    body {
        background-color: beige;
    }

    .logo {
        position: absolute;
        top: 5px;
        left: 50px;
    }

    nav ul {
        box-shadow: 0px 0px 3px rgba(0, 0, .2);
        position: absolute;
        top: 15px;
        right: 50px;
        background-color: rgb(239, 232, 195);
        display: flex;
        border-radius: 50px;
        margin-left: 320px;
        margin-right: 20px;

    }

    nav ul li {
        padding-left: 10px;
        text-align: center;
        list-style: none;
        line-height: 50px;
        width: 150px;
    }

    nav ul li a {
        color: rgb(189, 126, 60);
        /*color:white;*/
        font-size: 20px;
        text-decoration: none;
        font-weight: bold;
    }

    nav ul li a:hover {
        color: white;
        background-color: rgb(166, 121, 56);
        border-radius: 50px;
        padding: 5px;
    }

    .container {

        justify-content: center;
        align-items: center;
        height: 300px;
        width: 600px;
        margin: auto;
        padding: 20px;
        margin-top: 250px;
        border: 2px double black;
        position: relative;
        bottom: 70px;
    }

    h2 {
        text-align: left;
        color: black;
    }

    .container select {
        height: 40px;
        width: 100%;
        padding: 10px;
        margin-top: 40px;
        border-radius: 5px;
        border: 1px solid #ccc;
        outline: none;
        text-align: left;
        background-color: #CDA45E;
        color: white;
    }

    .btn button {
        width: 30%;
        margin-top: 70px;
        padding: 10px;
        font-size: 20px;
        color: #fff;
        border: 2px solid white;
        border-radius: 5px;
        background-color: #CDA45E;


    }

    .btn button:hover {
        cursor: pointer;
        color: #CDA45E;
        background-color: transparent;
        border: 2px solid #CDA45E;
    }

    .gallery {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        top: 40px;
    }

    .image-container {
        display: flex;
        justify-content: center;
        margin: 10px 0;
    }

    .image-container img {
        /*max-width: 100%;*/
        width: 50%;
        height: 50%;
        border: 2px double black;
        margin: 40px;

    }
</style>

<nav>
    <h1 class="logo"><img src="LOGO.png" alt="logo" width="200" height="70"></h1>
    <ul>
        <li><a href="logout.php">Log out</a></li>
        <li><a href="../about.php">ِAbout</a></li>
        <li><a href="st_ma.php">Ordered Supply</a></li>
        <li><a href="st_good_behav.php">Good behaviour</a></li>
        <li><a href="st_show.php">Tables</a></li>
        <li><a href="st_marks.php">Result</a></li>
    </ul>
</nav>

<?php

require_once 'conn.php';
// Get the team name from the select dropdown
if (isset($_GET['team_name'])) {
    $team_name = mysqli_real_escape_string($conn, $_GET['team_name']);
    $query = "SELECT image_name FROM images WHERE team_name = '$team_name'";
    $result = mysqli_query($conn, $query);

    echo "<div class='gallery'>";
    while ($row = mysqli_fetch_assoc($result)) {
        $image_name = $row['image_name'];
        $image_path = "../images/$image_name";
        if (file_exists($image_path)) {
            echo "<div class='image-container'><img src='$image_path' width='750' height='470'></div>";
        }
    }
    echo "</div>";
}

// Close the database connection
mysqli_close($conn);
?>

<!-- HTML select dropdown to filter by team name -->
<body dir = "rtl">
    
<center>
    <div class="container">
        <h2>: Choose the academic year to know the class schedule</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <select name="team_name">
                <option value="Team 1">First year: Information Technology Department</option>
                <option value="Team 2">Second year: Information Technology Department</option>
                <option value="Team 3">Third year: Information Technology Department</option>
                <option value="Team 4">Fourth year: Information Technology Department</option>
            </select>
            <div class="btn">
                <button type="submit">Filter</button>
            </div>
        </form>
    </div>
</center>
</body>