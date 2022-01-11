<?php

session_start();

if (!isset($_SESSION['username'])) {
	header("Location: index.php");
}

include 'config.php';
$userid = '';

$deneme = $_SESSION['username'];

$sql = "SELECT id FROM users WHERE username= '$deneme '";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {

		$userid = $row["id"];
	}
}


if (isset($_POST['upload'])) {
	$location = "uploads/";
	$file_new_name = $_FILES["file"]["name"];
	$file_name = $_FILES["file"]["name"];
	$file_temp = $_FILES["file"]["tmp_name"];
	$file_size = $_FILES["file"]["size"];


	if ($file_size > 20485760) {
		echo "<script>alert(' File size is so big.')</script>";
	} else {
		$sql = "INSERT INTO uploaded_files (name, new_name,userid)
			VALUES ('$file_name', '$file_new_name', '$userid')";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			move_uploaded_file($file_temp, $location . $file_new_name);
			echo "<script>alert('File uploaded successfully.')</script>";
		} else {
			echo "<script>alert('You can not upload this file.')</script>";
		}
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Upload File</title>
</head>

<body>
	<div class="file__upload">
		<div class="header">
			<p><i class="fa fa-cloud-upload fa-2x"></i><span><span>Up</span>load File</span></p>
		</div>
		<form action="" method="POST" enctype="multipart/form-data" class="body">



			<input type="file" name="file" id="upload" required>
			<label for="upload">
				<i class="fa fa-file-text-o fa-3x"></i>
				<p>

					<span>BROWSE</span> to upload a file
				</p>
			</label>
			<p class="login-register-text"> <a href="user_files.php">Click here to see your files.</a>.</p>
			<button name="upload" class="btn">Upload</button>
		</form>
	</div>
	<?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>

	<a href="logout.php"><b>Logout</b> </a>
</body>

</html>