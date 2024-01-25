<?php 
	session_start();
	require "connect.php";

		if(isset($_POST['submit'])){
			$username = htmlspecialchars($_POST['username']);
			$password = htmlspecialchars($_POST['password']);
			$query = "SELECT userid,username,password FROM user WHERE username = ?";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("s",$username);
			$stmt->execute();
			$stmt->store_result();
			if($stmt->num_rows == 1){
				$stmt->bind_result($user_id, $db_username, $db_password);
        		$stmt->fetch();
        		if(password_verify($password,$db_password)){
        			$_SESSION['user'] = $db_username;
        			header("location: ../index.php");
        		}else{
        			$error_message = "Invalid Password!";
        			echo "$error_message";
        		}
			}else{
				$error_message = "Invalid Username";
				echo "$error_message";

			}
		}
		if(isset($_POST['register_1'])){
			$_SESSION['namalengkap'] = htmlspecialchars($_POST['namalengkap']);
			$_SESSION['alamat'] = htmlspecialchars($_POST['alamat']);
			$_SESSION['email'] = htmlspecialchars($_POST['email']);
			
			header('location: ../login.php?view=register&page=2');
			exit();
		}
		if(isset($_POST['register_2'])){
			$username = htmlspecialchars($_POST['username']);
			$password = htmlspecialchars($_POST['password']);
			$email = $_SESSION['email'];
			$namalengkap = $_SESSION['namalengkap'];
			$alamat = $_SESSION['alamat'];
			$hashedPw = password_hash($password, PASSWORD_DEFAULT);
			$userid = rand(10,2000);

			$query = $conn->prepare("INSERT INTO user VALUES (?, ?, ?, ?, ?, ?)");
			$query->bind_param("isssss",$userid,$username,$hashedPw,$email,$namalengkap,$alamat);
			if($query->execute()){
				unset($_SESSION['namalengkap']);
				unset($_SESSION['alamat']);
				unset($_SESSION['email']);
				$query->close();
				header("location: ../index.php");
			};
			
		}
		if(isset($_GET['action'])&& $_GET['action']== 'logout'){
			if(session_destroy()){
				header("location: ../index.php");
			};
			
		}
	

 ?>