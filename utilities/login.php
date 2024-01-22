<?php 
	session_start();
	require "connect.php";

	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username' AND password = '$password'");
		if(mysqli_num_rows($result)){
			foreach ($result as $user) {
				$_SESSION['user'] = $user;
				header("location: ../");
			}
			
		}else{
			echo mysqli_error($conn);
		}
	}

 ?>