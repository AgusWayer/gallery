 	<?php 
	session_start();
	require "connect.php";

		if(isset($_POST['submit'])){
			$username = htmlspecialchars($_POST['username']);
			$password = htmlspecialchars($_POST['password']);
			$query = "SELECT userid,username,password,profile FROM user WHERE username = ?";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("s",$username);
			$stmt->execute();
			$stmt->store_result();
			if($stmt->num_rows == 1){
				$stmt->bind_result($user_id, $db_username, $db_password,$profile);
        		$stmt->fetch();
        		if(password_verify($password,$db_password)){
        			$_SESSION['user'] = [
        				"id"=>$user_id,
        				"username" => $db_username,
        				"profile" => $profile
        			];

        			header("location: ../index.php");
        		}else{
        			header("location: ../login.php?msg=101");
        		}
			}else{
				header("location: ../login.php?msg=102");

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
			$_SESSION['username'] = htmlspecialchars($_POST['username']);
			$_SESSION['password'] = htmlspecialchars($_POST['password']);
			header('location: ../login.php?view=register&page=3');
			exit();
			
		}
		if(isset($_POST['register_3']) && isset($_FILES['profile'])){

			$username = htmlspecialchars($_SESSION['username']);
			$password = htmlspecialchars($_SESSION['password']);
			$email = $_SESSION['email'];
			$namalengkap = $_SESSION['namalengkap'];
			$alamat = $_SESSION['alamat'];
			$hashedPw = password_hash($password, PASSWORD_DEFAULT);
			$userid = rand(10,2000);
			
			$profile_name = $_FILES['profile']['name'];
			$profile_tmp_name = $_FILES['profile']['tmp_name'];
			$profile_size = $_FILES['profile']['size'];
			$types = ['jpg','jpeg','png','webp'];
			$name_explode = explode(".",$profile_name);
			$profile_type = strtolower(end($name_explode));
			$profile_new_name = $profile_name.date('d-m-Y');
			if(in_array($profile_type,$types)){
				if($profile_size < 5000000){
					move_uploaded_file($profile_tmp_name,"../profile/".$profile_new_name);
					$query = $conn->prepare("INSERT INTO user VALUES (?, ?, ?, ?, ?, ?, ?)");
					$query->bind_param("issssss",$userid,$username,$hashedPw,$profile_new_name,$email,$namalengkap,$alamat);
					if($query->execute()){
						unset($_SESSION['namalengkap']);
						unset($_SESSION['alamat']);
						unset($_SESSION['email']);
						unset($_SESSION['username']);
						unset($_SESSION['password']);
						$query->close();
						header("location: ../login.php");
					}
				}else{
					header("location: ../login?view=register&page=3&msg=202");
				}
			}

			
		}
		if(isset($_GET['action'])&& $_GET['action']== 'logout'){
			if(session_destroy()){
				header("location: ../index.php");
			};
			
		}
	

 ?>