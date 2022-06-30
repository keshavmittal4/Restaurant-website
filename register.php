<?php
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	// $gender = $_POST['gender'];
	// $roll_num = $_POST['roll_num'];
	// $Course = $_POST['Course'];
	// $number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','restaurant');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(username, email, password) values(?, ?, ?)");
		$stmt->bind_param("sss", $username, $email, $password);
		$execval = $stmt->execute();
		// echo "	Registration Successfully...";
		// if(session_id() == '' || !isset($_POST)){session_start();}
		if(isset($_POST["submit_btn"]))
		{
			header("location:Login.html?status=success");
		}
		$stmt->close();
		$conn->close();
	}
?>