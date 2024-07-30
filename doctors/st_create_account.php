<?php
require_once 'conn.php';
session_start();
if (!isset($_SESSION["id"]) || $_SESSION["id"] == '') {
	header('location: index.php');
}

$query2 = "select * from  info_student order by id_school desc limit 1";
$result2 = mysqli_query($conn, $query2);
$row = mysqli_fetch_array($result2);
error_reporting(0);
$last_id = $row['id_school'];
if ($last_id == "") {
	$id_school = "000";
} else {
	$id_school = substr($last_id, 3);
	$id_school = intval($id_school);
	$id_school = "000" . ($id_school + 1);
}


if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
} else {
	$teacher_id = $_SESSION["id"];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$id_school = $_POST['id_school'];
	$phone = $_POST['phone'];
	$grading = $_POST['class'];
	$dir = "../images/";
	$first_mark = 0;
	$second_mark = 0;
	$third_mark = 0;
	$fourth_mark = 0;
	$final_mark = 0;
	$target_file = $dir . basename($_FILES["image"]["name"]);
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
	$file = $_FILES['image']['tmp_name'];
	$picture = $_FILES['image']['name'];
	if ($picture == "") {
		echo "<script>alert('Choose a picture')</script>";
	} else {
		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			echo "<script>alert('PNG, JPG, and JPEG Type')</script>";
		} else {
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			move_uploaded_file($_FILES["image"]["tmp_name"], $dir . $_FILES["image"]["name"]);

			$query = "INSERT INTO  info_student(id_school,teacher_number,firstname,lastname,phone,picture,first_mark,second_mark, third_mark,fourth_mark,final_mark,class) VALUES 
     ('$id_school','$teacher_id','$firstname','" . $lastname . "','$phone','$picture'
     ,'$first_mark','$second_mark','$third_mark','$fourth_mark','$final_mark','$grading')";

			if (mysqli_query($conn, $query)) {
				echo "<script>alert('saved')</script>";
				echo '<script>windows: location="st_view.php"</script>';
			} else {
				echo "<script>alert('Error')</script>";
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
		margin: auto;
		width: 600px;
		height: 620px;
		padding: 20px;
		box-shadow: 0 15px 20px #ABB2B9;
		position: relative;
		top: 90px;
	}

	.form {
		background-color: rgb(12, 11, 9, 0.6);
		padding: 10px;
		border: 3px solid #CDA45E;
		display: flex;
		flex-direction: column;
		height: 95%;
		width: 95%;
		box-shadow: 0px 0px 20px rgb(0, 0, .2);
	}

	.form h2 {
		margin: 15px;
		font-size: 50px;
		color: #CDA45E;
		text-align: center;
	}

	.box {
		position: relative;
		right: 20px;
		padding: 12px;
		margin: 5px;
		border: 2px solid #CDA45E;
		outline: none;
		border-radius: 50%;
		color: black;
		background-color: #CDA45E;
	
	}

	.input-box input {
		display: flex;
		flex-wrap: wrap;
		width: 50%;
		padding-bottom: 15px;
		margin: 7px;
	}

	.input-box:nth-child(2n) {
		justify-content: end;

	}

	.input-box label {
		font-weight: bold;
		margin: 5px 0;
		color: black;
		font-size: 17px;
		position: relative;
		left: 40px;
	}

	#edit {
		position: relative;
		left: 40px;
	}

	.input-box input {
		padding: 0 10px;
		border-radius: 50px;
		border: 1px solid #ccc;
		outline: none;
		height: 40px;
		width: 85%;
		left: 40px;
	}

	.form-select {
		border-radius: 50px;
		height: 40px;
		width: 86%;
		padding: 0 10px;
		background-color: #CDA45E;
		border: 1px solid #ccc;
		outline: none;
		position: relative;
		color: white;
		left: 40px;

	}

	.form-select option {
		background-color: #CDA45E;
		text-align: left;
		color: white;
	}

	input::placeholder {
		color: white;
		text-align: left;
	}

	.input-box input:is(:focus, :valid) {
		box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
	}

	.button-container button {
		position: relative;
		bottom: 20px;
		padding: 10px;
		display: block;
		font-size: 20px;
		color: #fff;
		border: 2px solid #CDA45E;
		border-radius: 5px;
		background-image: linear-gradient(to right, rgb(12, 11, 9, 0.6), #CDA45E);
	}

	.button-container button:hover {
		cursor: pointer;
		background-image: linear-gradient(to right, #CDA45E, rgb(12, 11, 9, 0.6));
	}

	#image {
		color: white;
		border-radius: 50px;
		padding: 10px 15px;
		height: 40px;
		text-align: left;
	}

	div footer {
		margin-top: 130px;
		font-size: 20px;
		font-weight: bold;
		margin-bottom: 5px;
	}
</style>

<body dir ="ltr">

	<?php include('teacher_header.php'); ?>
	<br>

	<div class="container">
		<form action="" method="post" enctype="multipart/form-data" class="form">
			<h2>Add Student</h2>

			<div class="input-box">
				<label>Student ID</label>
				<input type="text" placeholder="ID" class="box" name="id_school" id="id_school" style="color: white; text-align:left;" value="<?php echo $id_school; ?>" readonly>
			</div>

			<div class="input-box">
				<label for="Title">frist name</label>
				<input type="text" placeholder="enter frist name" class="box" name="firstname" value="<?php echo ''; ?>" required>
			</div>

			<div class="input-box">
				<label for="Author">last name</label>
				<input type="text" placeholder="last name" class="box" name="lastname" value="<?php echo ''; ?>" required>
			</div>

			<div class="input-box">
				<label for="Author" id="edit">Mobile number</label>
				<input type="text" placeholder="Mobile number" class="box" name="phone" required>
			</div>

			<br>

			<div class="input-box">
				<select class="form-select" name="class">
					<option class="box" value="First division">First division</option>
					<option class="box" value="second division">second division</option>
					<option class="box" value="third division">third division</option>
					<option class="box" value="Fourth division"> fourth division</option>
				</select>
			</div>
			<br>
			<div class="input-box">
				<label for="Author">Add image</label>
				<input type="file" placeholder="Add image" class="box" name="image" id="image" value="<?php echo ''; ?>" required>
			</div>
			<br>
			<br>
			<center>
				<div class="button-container">
					<button name="save" data-toggle="modal"> Add student</button>
				</div>
			</center>
		</form>
	</div>

	<center>
		<div>
			<footer>All rights are save <img src="..//photos/right.png" width="22px" height="22px"> Misr International Technology University</footer>
		</div>
	</center>

</body>

</html>