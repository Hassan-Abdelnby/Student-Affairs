	<?php
	require_once 'conn.php';
	include_once "header.php";
	session_start();
	if (!isset($_SESSION["id"]) || $_SESSION["id"] == '') {
		header('location: index.php');
	}

	$id = $_GET['id'];
	$sql = "SELECT * FROM doctor WHERE id = '$id'";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_array($result)) {
		$upfirstname = $row['firstname'];
		$uplastname = $row['lastname'];
		$upusername = $row['username'];
		$uppassword = $row['password'];
		$upusertype = $row['usertype'];
	}

	if (!isset($_FILES['image']['tmp_name'])) {
		echo "";
	} else {

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$dir = "../images/";
		$target_file = $dir . basename($_FILES["image"]["name"]);
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
		$file = $_FILES['image']['tmp_name'];
		$picture = $_FILES['image']['name'];
		if ($picture == "") {
			echo "<script>alert('Please select an image')</script>";
		} else {
			if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
				echo "<script>alert('PNG, JPG, and JPEG are allowed!')</script>";
			} else {
				$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
				$image_name = addslashes($_FILES['image']['name']);
				move_uploaded_file($_FILES["image"]["tmp_name"], $dir . $_FILES["image"]["name"]);

				$sql = "UPDATE doctor SET firstname='$firstname'
			,lastname='$lastname',username='$username',
			password='$password',picture='$picture' where id='$id'";
				if (mysqli_query($conn, $sql)) {
					echo "<script>alert('Modified successfully')</script>";
					echo '<script>windows: location="doctor_view.php"</script>';
				} else {
					echo "<script>alert('Error')</script>";
					echo '<script>windows: location="edit_doctor.php?id=' . $id . '"</script>';
				}
			}
		}
	}
	?>

	<head>
		<link rel="icon" href="../logo/icon.jpg">
	</head>
	<style>
		body {
			background-color: beige;
		}

		.container {
			justify-content: center;
			align-items: center;
			height: 500px;
			width: 800px;
			margin: auto;
			padding: 20px;
			margin-top: 20px;
			box-shadow: 0 15px 20px #ABB2B9;
			position: relative;
			bottom: 35px;
			background-color: rgba(12, 11, 9, 0.6);
			border: 3px solid #CDA45E;
		}

		h2 {
			font-size: 33px;
			font-weight: 600;
			text-align: center;
			color: #CDA45E;
			padding-bottom: 8px;
		}

		.content {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			padding: 20px 0;
			text-align: left;
		}

		.input-box {
			display: flex;
			flex-wrap: wrap;
			width: 50%;
			padding-bottom: 15px;
		}

		.input-box:nth-child(2n) {
			justify-content: end;

		}

		.input-box label {
			width: 95%;
			color: black;
			font-weight: bold;
			margin: 5px 0;
		}

		.input-box input {
			height: 40px;
			width: 90%;
			padding: 0 10px;
			border-radius: 5px;
			border: 1px solid #ccc;
			outline: none;
			background-color: #CDA45E;
			color: white;
		}

		/*.input-box input:is(:focus, :valid) {
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
}*/

		.button-container {
			margin: 15px 0;
		}

		.button-container button {
			width: 50%;
			margin-top: 10px;
			padding: 10px;
			display: block;
			font-size: 20px;
			color: #fff;
			border: 1px solid white;
			border-radius: 5px;
			/*background-image: linear-gradient(to right, #aa076b, #61045f);*/
			background-color: #CDA45E;
		}

		.button-container button:hover {
			cursor: pointer;
			/*background-image: linear-gradient(to right, #61045f, #aa076b);*/
		}

		#image {
			height: 40px;
			border-radius: 5px;
			padding: 10px 15px;

		}

		input::placeholder {
			text-align: left;
			color: white;
		}
	</style>

	<body>

		<?php include('admin_header.php'); ?>
		</br>

		<div class="container">
			<form action="" method="post" enctype="multipart/form-data">
				<h2>Modify data</h2>
				<div class="content">
					<div class="input-box">
						<label for="Title">frist name</label>
						<input type="text" placeholder="enter frist name" name="firstname" value="<?php echo $upfirstname; ?>" required>
					</div>
					<div class="input-box">
						<label for="Author">last name </label>
						<input type="text" placeholder="enter last name" name="lastname" value="<?php echo $uplastname; ?>" required>
					</div>
					<div class="input-box">
						<label for="Publisher">user name</label>
						<input type="text" placeholder="user name" name="username" value="<?php echo $upusername; ?>" required>
					</div>
					<div class="input-box">
						<label for="Publisher">password</label>
						<input type="password" placeholder="enter password" name="password" value="<?php echo $uppassword; ?>" required>
					</div>
					<div class="input-box">
						<label for="Publisher">Add image</label>
						<input type="file" placeholder="Add image" name="image" id="image" value="<?php echo ''; ?>" required>
					</div>
					<br>
					<br>
				</div>
				<center>
					<div class="button-container">
						<button name="update" data-toggle="modal">
							edit
						</button>
					</div>
				</center>
			</form>
		</div>

	</body>

	</html>