<?php
require_once 'conn.php';
/*include_once "header.php";*/
session_start();
if (!isset($_SESSION["id"]) || $_SESSION["id"] == '') {
	header('location: index.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM info_student WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
	$upfirstname = $row['firstname'];
	$uplastname = $row['lastname'];
	$upfirst = $row['first_mark'];
	$upsecond = $row['second_mark'];
	$upthird = $row['third_mark'];
	$upfourth = $row['fourth_mark'];
	$upfifth = $row['fifth_mark'];
	$upsixth = $row['sixth_mark'];
}

if (empty($_POST['firstname'])) {
	echo "";
} else {
	$upfirstname = $_POST['firstname'];
	$uplastname = $_POST['lastname'];
	$upfirst = $_POST['first'];
	$upsecond = $_POST['second'];
	$upthird = $_POST['third'];
	$upfourth = $_POST['fourth'];
	$upfifth = $_POST['fifth'];
	$upsixth = $_POST['sixth'];

	$query = "UPDATE info_student SET firstname='$upfirstname', lastname='$uplastname', first_mark='$upfirst', second_mark='$upsecond', third_mark='$upthird', fourth_mark='$upfourth', fifth_mark='$upfifth', sixth_mark='$upsixth' WHERE id='$id'";
	if (mysqli_query($conn, $query)) {
		echo "<script>alert('Updated successfully')</script>";
		echo '<script>window.location="st_view.php"</script>';
	} else {
		echo "<script>alert('Error')</script>";
		echo '<script>window.location="st_add.php?id=' . $id . '"</script>';
	}
}
?>
<html dir="ltr">
<head>
<style>

.container {
    justify-content: center;
    align-items: center;
    height: 735px;
    width: 400px;
    margin: auto;
    padding: 20px;
    margin-top: 100px;
    box-shadow: 0 15px 20px #ABB2B9;
}

.form {
    /*display: flex;
    flex-direction: column;
    width: 50%;
    align-items: center;
    box-shadow: 0px 0px 10px rgba(0, 0, .2);
    border-radius: 10px;*/
    background-color: rgb(12,11,9,0.6);
    padding: 10px;
    border: 3px solid #CDA45E;
    display: flex;
    flex-direction: column;
    height: 97%;
    width: 80%HTTP_RAW_POST_DATA;
    box-shadow: 0px 0px 20px rgb(0, 0, .2);
 }

h2 {
    font-size: 35px;
    font-weight: 600;
    text-align: center;
    color: #CDA45E;
    padding-bottom: 3px;
    border-bottom: 1px solid silver;
}

.input-box{
	border-radius: 50px;
	width: 600px;
	position: relative;
    left: 130px;
} 

.input-box input {
	width: 300px;
    display: flex;
    flex-wrap: wrap;
    padding-bottom: 15px;
    margin: 3px;
}

.box {
	border-radius: 50px;
	width: 150px;
	position: relative;
	right: 20px;
    padding: 12px;
    margin: 5px;
    border: 2px solid #CDA45E;
    outline: none;
    color: black;
    background-color: #CDA45E;
} 

.input-box:nth-child(2n) {
    justify-content: end;
}

.form-group label {
	font-size: 17px;
    color: black;
    font-weight: bold;
    margin: 3px 0;
}

.input-box input {
    height: 40px;
    width: 50%;
    padding: 0 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    outline: none;
	right: 240px;
}

.input-box input:is(:focus, :valid) {
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
}

.button-container {
    margin: 2px 0;
}

.button-container button {
    width: 130px;
    padding: 10px;
    display: block;
    font-size: 20px;
    color: #fff;
    border: 2px solid #CDA45E;
    border-radius: 5px;
    background-image: linear-gradient(to right, rgb(12,11,9,0.6), #CDA45E);
}

.button-container button:hover {
    cursor: pointer;
    background-image: linear-gradient(to right, #CDA45E , rgb(12,11,9,0.6));
}

div footer{
    margin-top: 50px;
	font-size: 20px;
	font-weight: bold;
	margin-bottom: 5px;
}

</style>
</head>

<body>
	<center>
		<?php include('teacher_header.php'); ?>

		<div class="container">
			<form action="" method="post" enctype="multipart/form-data" class = "form">
				<h2>Modify data</h2>
				<div class="form-group">
					<label for="Title">frist name</label>
					<div class="input-box">
						<input type="text" name="firstname"  class = "box" placeholder="frist name" value="<?php echo $upfirstname; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="Author">second name</label>
					<div class="input-box">
						<input type="text" name="lastname" class = "box" placeholder="second name" value="<?php echo $uplastname; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="Author"> first subject</label>
					<div class="input-box">
						<input type="text" name="first" class = "box" placeholder="first subject" value="<?php echo $upfirst; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="Author">second subject </label>
					<div class="input-box">
						<input type="text" name="second" class = "box" placeholder="second subject" value="<?php echo $upsecond; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="Author"> third subject</label>
					<div class="input-box">
						<input type="text" name="third" class = "box" placeholder="third subject" value="<?php echo $upthird; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="Author">fourth subject</label>
					<div class="input-box">
						<input type="text" name="fourth" class = "box" placeholder="fourth subject" value="<?php echo $upfourth; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="Author">fifth subject</label>
					<div class="input-box">
						<input type="text" name="fifth" class = "box" placeholder="fifth subject" value="<?php echo $upfifth; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="Author">sixth subject</label>
					<div class="input-box">
						<input type="text" name="sixth"class = "box"  placeholder="sixth subject" value="<?php echo $upsixth; ?>" required>
					</div>
				</div>

				<br>
				<div class="button-container">
					<button name="update" data-toggle="modal">Edit</button>
				</div>
				<br>
			</form>
		</div>
		<div><footer>All rights are save <img src = "..//photos/right.png" width = "22px" height = "22px"> Misr International Technology University</footer></div>
	</center>
</body>
</html>
