<?php
require_once 'conn.php';

session_start();
if (!isset($_SESSION["id"]) || $_SESSION["id"] == '') {
	header('location: index.php');
}
?>

<head>

	<style>
		body {
			background-color: beige;
		}


		.photo {
			border-radius: 50px;
			width: 50px;
			height: 50px;
			border: 2px solid #ccc;
		}

		table {
			margin-top: 100px;
			border-collapse: collapse;
			width: 100%;
		}

		th {
			background-color: rgb(12, 11, 3, 0.6);
			color: white;
			border: 2px solid gray;
			padding: 8px;
			text-align: center;
			font-weight: bold;
		}

		td {
			border: 2px solid gray;
			padding: 8px;
			text-align: center;
			background-color: rgb(239, 232, 195);
		}

		tr:hover {
			background-color: #ddd;
		}

		.space {
			width: 7%;
		}

		.btn-add {
			text-decoration: none;
			border-radius: 10px;
			padding: 10px 10px;
			color: #CDA45E;
		}

		.btn-add:hover {
			text-decoration: none;
			border-radius: 10px;
			color: black;
		}

		.btn-edit {
			text-decoration: none;
			border-radius: 10px;
			padding: 10px 10px;
			color: white;
			background-color: #CDA45E;
		}

		.btn-edit:hover {
			text-decoration: none;
			border-radius: 10px;
			color: #CDA45E;
			background-color: white;
		}

		.btn-delete {
			text-decoration: none;
			border-radius: 10px;
			padding: 10px 10px;
			color: #CDA45E;
			background-color: white;
		}

		.btn-delete:hover {
			text-decoration: none;
			border-radius: 10px;
			color: white;
			background-color: #CDA45E;
		}

		.th {
			width: 5%;
		}
		.add{
			width: 7%;
		}
	</style>
</head>

<body dir = "ltr">
	<center>

		<?php include('teacher_header.php'); ?>


		<table class="table table-responsive table-lg table-md 
		table-sm  table-hover   table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>number id</th>
					<th>Image</th>
					<th class="space">band</th>
					<th class="space">First Name</th>
					<th class="space">second name</th>
					<th class="space">Mobile number</th>
					<th>first subject</th>
					<th> second subject </th>
					<th> third subject</th>
					<th>fourth subject</th>
					<th>fifth subject</th>
					<th>sixth subject</th>
					<th class="th">percentage</th>
					<th class="th">result</th>
					<th class="add">Add grades</th>
					<th>amendment</th>
					<th>delete</th>
				</tr>
			</thead>
			<?php


			$sql = "SELECT * FROM  info_student where teacher_number = '" . $_SESSION["id"] . "'  ";

			$query = mysqli_query($conn, $sql);

			while ($row = mysqli_fetch_array($query)) {

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


				$final_mark  = ($first_mark + $second_mark + $third_mark + $fourth_mark + $fifth_mark + $sixth_mark) / 6;

				if ($final_mark >= 80 && $final_mark <= 100) {
					$remarks = "Excellence";
				} elseif ($final_mark >= 70 && $final_mark <= 80) {
					$remarks = "Very Good";
				} elseif ($final_mark >= 60 && $final_mark <= 70) {
					$remarks = " Good";
				} elseif ($final_mark >= 50 && $final_mark <= 60) {
					$remarks = "Acceptable";
				} else {
					$remarks = "Failed";
				}
				$picture = $row['picture'];


			?>

				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo "$id_school"; ?></td>
					<td><img src="../images/<?php echo "$picture"; ?>" class="photo"></td>
					<td><?php echo $row['class']; ?></td>
					<td><?php echo "$firstname"; ?></td>
					<td><?php echo "$lastname"; ?></td>
					<td><?php echo "$phone"; ?></td>
					<td><?php echo "$first_mark"; ?></td>
					<td><?php echo "$second_mark"; ?></td>
					<td><?php echo "$third_mark"; ?></td>
					<td><?php echo "$fourth_mark"; ?></td>
					<td><?php echo "$fifth_mark"; ?></td>
					<td><?php echo "$sixth_mark"; ?></td>

					<td style="background-color: #CDA45E; color : white;"><?php echo "$final_mark"; ?></td>

					<td style="background-color: white;"><?php echo "$remarks"; ?></td>


					<td>

						<a class="btn-add" href="st_add.php?id=<?php echo $row['id']; ?>" role="button">Add grades</a>

					</td>


					<td>

						<a class="btn-edit" href="st_edit.php?id=<?php echo $row['id']; ?>" role="button">Edit</a>

					</td>
					<td>


						<a class="btn-delete" href="st_delete.php?id=<?php echo $row['id']; ?>" role="button">Delete</a>
					</td>


				</tr>

			<?php } ?>
		</table>
	</center>

</body>

</html>