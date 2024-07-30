<?php
require_once 'conn.php';
include_once "header.php";
session_start();
?>

<head>
	<meta charset="utf-8" />
	<title>Login page</title>
	<link rel="icon" href="../logo/icon.jpg">
	<style>
		body {
			background-color: beige;
		}

		form {
			position: relative;
			top: 100px;
			border: 2px solid black;
			height: 150px;
			width: 500px;
			margin-bottom: 100px;
			margin-top: 30px
		}

		.btn {
			position: relative;
			right: 50px;
			border: 1px solid white;
			border-radius: 5px;
			color: white;
			font-weight: bold;
			font-size: 15px;
			padding: 15px;
			border-radius: 50px;
			background-image: linear-gradient(to right, #CDA45E, rgb(12, 11, 9, 0.6));
			border: 2px solid #CDA45E;
		}

		.btn:hover {
			cursor: pointer;
			background-color: #CDA45E;
			color: white;
		}

		.btn2 {
			position: relative;
			left: 350px;
			font-size: 15px;
			font-weight: bold;
			border: 1px solid white;
			border-radius: 5px;
			color: white;
			font-weight: bold;
			padding: 15px;
			border-radius: 50px;
			background-image: linear-gradient(to right, #CDA45E, rgb(12, 11, 9, 0.6));
			border: 2px solid #CDA45E;
		}

		.btn2:hover {
			background-image: linear-gradient(to right, #CDA45E, rgb(12, 11, 9, 0.6));
			background-color: #CDA45E;
			color: white;
		}

		b {
			font-size: 20px;
			position: relative;
		}

		input {
			margin-top: 30px;
			background-color: #CDA45E;
			width: 30%;
			height: 20%;
			border: 1px solid white;
			border-radius: 10px;
			position: relative;
			
		}

		table {
			margin-top: 15px;
			border-collapse: collapse;
			width: 100%;
		}

		th,
		td {
			/*border: 1px solid #ddd;*/
			border: 2px solid rgba(12, 11, 9, 0.6);
			padding: 15px;
			text-align: center;
			background-color: rgb(239, 232, 195);
		}

		th {
			/*background-color: #f2f2f2;*/
			background-color: rgba(12, 11, 9, 0.6);
			color: white;
		}

		tr:hover {
			background-color: #ddd;
		}

		.pdf {
			text-decoration: none;
			padding: 8px 15px;
			/*border: 1px solid green;*/
			border-radius: 10px;
			/*background-color: white;
			color: green;
			font-weight: bold;
			font-size: 15px;*/
			border: 2px solid rgb(189, 126, 60);
			background-color: rgb(189, 126, 60);
			color: white;

		}

		.pdf:hover {
			text-decoration: none;
			padding: 8px 15px;
			border-radius: 7px;
			/*background-color: green;
			color: white;
			font-weight: bold;
			font-size: 15px;*/
			background-color: transparent;
			border: 2px solid rgb(189, 126, 60);
			color: rgb(189, 126, 60);
		}

		.logo {
			position: absolute;
			top: 5px;
			left: 50px;
		}

		nav ul {
			box-shadow: 0px 0px 3px rgba(0, 0, .2);
			position: relative;
			background-color: rgb(239, 232, 195);
			display: flex;
			border-radius: 50px;
			margin-top: 30px;
			margin-left: 325px;
			margin-right: 30px;
			width: 60%;

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

		input::placeholder {
			text-align: left;
			color: white;
		}
		
	</style>
</head>

<body>
	<!--<div class="col-12">
		<form action="" method="post">
			<table>
				<tr>

					<button class="btn" name="search_student" type="submit">Search now</button>


				</tr>

			</table>
		</form>
	</div>

	<div id="right_side"><br><br>
		<div id="demo">-->
	<nav>
		<h1 class="logo"><img src="LOGO.png" alt="logo" width="200" height="70"></h1>
		<ul>
			<li><a href="st_marks.php">Result</a></li>
			<li><a href="st_show.php">Tables</a></li>
			<li><a href="st_good_behav.php">Good behaviour</a></li>
			<li><a href="st_ma.php">Ordered Supply</a></li>
			<li><a href="../about.php">ِAbout</a></li>
			<li><a href="logout.php">Log out</a></li>





			</ul>
	</nav>
	<center>
		<form action="" method="post">
			<h2>ID</h2>
			<button class="btn" name="search_by_roll_no_for_search" type="submit">Search now</button>
			<!--<b>Enter number id</b>-->
			<!--<input type="text" name="roll_no">-->
			<b> ID: </b><input type="text" name="roll_no" placeholder="Enter the id">
			<a href="st_services.php">
				<button class="btn2" name="search_by_roll_no_for_search" type="submit">Exit</button></a>

		</form>

		<!--<h4><b><u>Student result</u></b></h4><br><br>-->
	</center>
	<?php


	if (isset($_POST['search_by_roll_no_for_search'])) {
		$query = "select * from  info_student where id_school= '$_POST[roll_no]'";
		$query_run = mysqli_query($conn, $query);
		while ($row = mysqli_fetch_array($query_run)) {
	?>
			<table class="table table-responsive table-lg table-md table-sm  table-hover   table-bordered">

				<thead>
					<tr>
						<th>#</th>
						<th>number id</th>
						<th>frist name</th>
						<th>last name</th>
						<th>first subject</th>
						<th> second subject </th>
						<th> third subject</th>
						<th>fourth subject</th>
						<th>fifth subject</th>
						<th>sixth subject</th>

						<th>percentage</th>
						<th>result</th>
						<th>Print</th>

					</tr>
				</thead>
				<?php
				$id = $row['id'];
				$id_school = $row['id_school'];
				$firstname = $row['firstname'];
				$lastname = $row['lastname'];
				$phone = $row['phone'];
				$first_mark = $row['first_mark'];
				$second_mark = $row['second_mark'];
				$third_mark = $row['third_mark'];
				$fourth_mark = $row['fourth_mark'];
				$fifth_mark = $row['fifth_mark'];
				$sixth_mark = $row['sixth_mark'];


				$final_mark  = ($first_mark + $second_mark
					+ $third_mark + $fourth_mark + $fifth_mark + $sixth_mark) / 6;

				if (($final_mark >= 80) && ($final_mark <= 100)) {
					$remarks = "excellent";
				} elseif (($final_mark >= 70) && ($final_mark <= 80)) {
					$remarks = "very good";
				} elseif (($final_mark >= 60) && ($final_mark <= 70)) {
					$remarks = " good";
				} elseif (($final_mark >= 50) && ($final_mark <= 60)) {
					$remarks = "acceptable";
				} else {
					$remarks = "Failed";
				}
				?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo "$id_school"; ?></td>
					<td><?php echo "$firstname"; ?></td>
					<td><?php echo "$lastname"; ?></td>
					<td><?php echo "$first_mark"; ?></td>
					<td><?php echo "$second_mark"; ?></td>
					<td><?php echo "$third_mark"; ?></td>
					<td><?php echo "$fourth_mark"; ?></td>
					<td><?php echo "$fifth_mark"; ?></td>
					<td><?php echo "$sixth_mark"; ?></td>

					<td><?php echo "$final_mark"; ?></td>
					<td><?php echo "$remarks"; ?></td>



					<td>
						<a class="pdf" href="print_pdf.php?id=<?php echo $row['id']; ?>" role="button">print</a>
					</td>

				</tr>
			</table>
	<?php
		}
	}
	?>

</body>

</html>