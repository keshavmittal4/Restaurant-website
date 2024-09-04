<?php
	$username = $_POST['username'];
	$password = $_POST['password'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','restaurant');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into userlogin(username, password) values(?, ?)");
		$stmt->bind_param("ss", $username, $password);
		$execval = $stmt->execute();
		
		if(isset($_POST["submit_btn"]))
		{
			header("location:index.html?status=success");
		}
		$stmt->close();
		$conn->close();
	}
?>
