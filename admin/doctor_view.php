<?php
require_once 'conn.php';
include_once "header.php";

session_start();
if (!isset($_SESSION["id"]) || $_SESSION["id"] == '') {
	header('location: index.php');
}
?>

<head>
	<link rel="icon" href="../logo/icon.jpg">
</head>
<style>
	body {
		background-color: beige;
	}

	.photo {
		border-radius: 50px;
		width: 40px;
		height: 40px;
		/* height: 20%	; */
	}

	table {
		border-collapse: collapse;
	}

	th,
	td {
		border: 2px solid rgba(12, 11, 9, 0.6);
		padding: 8px;
		text-align: center;
		background-color: rgb(239, 232, 195);
	}

	th {
		background-color: rgba(12, 11, 9, 0.6);
		color: white;
	}

	tr:hover {
		background-color: #ddd;
	}

	.space {
		width: 23%;
	}

	.btn-edit {

		text-decoration: none;
		/*border: 2px solid #03a9f4;*/
		border-radius: 10px;
		padding: 8px 15px;
		/*color: #03a9f4;*/
		border: 2px solid rgb(189, 126, 60);
		background-color: rgb(189, 126, 60);
		color: white;
	}

	.btn-edit:hover {
		text-decoration: none;
		/*border: 2px solid #03a9f4;*/
		border-radius: 10px;
		padding: 8px 15px;
		/*color: white;
    background-color: #03a9f4;*/
		background-color: white;
		border: 2px solid white;
		color: rgb(189, 126, 60);
	}

	.btn-delete {

		text-decoration: none;
		border: 2px solid white;
		border-radius: 10px;
		padding: 8px 15px;
		color: rgb(189, 126, 60);
		background-color: white;

	}

	.btn-delete:hover {

		text-decoration: none;
		border: 2px solid rgb(189, 126, 60);
		border-radius: 10px;
		padding: 8px 15px;
		color: white;
		background-color: rgb(189, 126, 60);
	}
</style>

<body>


	<?php include('admin_header.php'); ?>
	<br>
	<form action="" post="POST">
		<table class="table-t1">
			<thead>
				<tr>
					<th>#</th>
					<th class="space">First Name</th>
					<th class="space">Last Name</th>
					<th class="space">User Name</th>
					<th class="space">Password</th>
					<th>Type</th>
					<th>Image</th>
					<th>Amendment</th>
					<th>Delete</th>
				</tr>
			</thead>


			<?php


			$sql = "SELECT * FROM doctor order by id ASC";

			$query = mysqli_query($conn, $sql);

			while ($row = mysqli_fetch_array($query)) {	?>
				<tbody>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['firstname']; ?></td>
					<td><?php echo $row['lastname']; ?></td>
					<td><?php echo $row['username']; ?></td>
					<td><?php echo $row['password']; ?></td>
					<td><?php echo $row['usertype']; ?></td>
					<td><img class="photo" src="../images/<?php echo $row['picture']; ?>"></td>

					<td>
						<a class="btn-edit" href="edit_doctor.php?id=<?php echo $row['id']; ?>">edit</a>
					</td>

					<td>
						<a class="btn-delete" href="delete_doctor.php?id=<?php echo $row['id']; ?>">delete</a>
					</td>

				</tbody>
			<?php } ?>
	</form>


</body>

</html>