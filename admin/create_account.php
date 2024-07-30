<head>
	<link rel="icon" href="../logo/icon.jpg">
</head>
<style>
	body {
		text-align: left;
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
		background-color: rgba(12, 11, 9, 0.6);
		border: 3px solid #CDA45E;
		position: relative;
		bottom: 40px;
	}

	h2 {
		font-size: 35px;
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
	}

	.input-box {
		display: flex;
		flex-wrap: wrap;
		width: 50%;
		padding-bottom: 15px;

	}

	/*.input-box:nth-child(2n) {
    justify-content: end;

}*/

	.input-box label {
		width: 95%;
		color: black;
		font-weight: bold;
		margin: 5px 0;
	}

	.input-box input {
		height: 40px;
		width: 95%;
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
		position: relative;
		top: 20px;
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
<?php
require_once 'conn.php';
include_once "header.php";
session_start();
if (!isset($_SESSION["id"]) || $_SESSION["id"] == '') {
	header('location: index.php');
}
if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
} else {
	$id_admin = $_SESSION['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$usertype = "Employee";
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

			$query = "INSERT INTO doctor
			(firstName,lastName,username,password,picture,usertype,id_admin)
			 VALUES ('$firstname','$lastname'
			 ,'$username','$password','$picture','$usertype','$id_admin')";
			mysqli_query($conn, $query);
			echo "<script>alert('saved')</script>";
			echo '<script>windows: location="doctor_view.php"</script>';
		}
	}
}
?>


<?php include('admin_header.php'); ?>
<br>
<!--<head>
	<link rel="stylesheet" href="../css/admin/create_account.css">
</head>-->

<div class="container">
	<form action="" method="post" enctype="multipart/form-data">
		<h2>Add an employee</h2>
		<div class="content">
			<div class="input-box">
				<label for="Title">First Name</label>
				<input type="text" placeholder="Enter first name" name="firstname" value="<?php echo ''; ?>" required>
			</div>
			<div class="input-box">
				<label for="Author">last name</label>
				<input type="text" placeholder="Enter last name" name="lastname" value="<?php echo ''; ?>" required>
			</div>
			<div class="input-box">
				<label for="Publisher">user name</label>
				<input type="text" placeholder="Enter user name" name="username" value="<?php echo ''; ?>" required>
			</div>
			<div class="input-box">
				<label for="Publisher">password</label>
				<input type="password" placeholder="ُEnter password" name="password" value="<?php echo ''; ?>" required>
			</div>
			<div class="input-box">
				<label for="Publisher">Add image</label>
				<input type="file" placeholder="Add image" name="image" id="image" value="<?php echo ''; ?>" required>
			</div>
			<!--	<div class="input-box">
					<label for="Publisher">id_admin:</label>
					<input type="text" placeholder="id_admin" name="id_admin" id="image" value="<?php echo ''; ?>" required>
				</div>
-->
			<br>
			<br>
		</div>
		<center>
			<div class="button-container">
				<button name="save" data-toggle="modal"> Add an employee
				</button>
			</div>
		</center>
	</form>
</div>





</body>

</html>