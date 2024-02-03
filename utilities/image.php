<?php 
	require'connect.php';
	if(isset($_POST['add-image']) && isset($_FILES['photo'])){
		$fotoid = rand(1000,2000);
		$judulfoto = htmlspecialchars($_POST['judulfoto']);
		$deskripsifoto = htmlspecialchars($_POST['deskripsifoto']);
		$tanggalunggah = date("Y-m-d");
		$albumid = htmlspecialchars($_POST['album']);
		$userid= htmlspecialchars($_POST['userid']);
		$foto_name = $_FILES['photo']['name'];
		$tmp_name = $_FILES['photo']['tmp_name'];
		$type = $_FILES['photo']['type'];
		$size = $_FILES['photo']['size'];
		$types_allowed = ['jpg','jpeg','png','webp'];
		$explode_name = explode('.', $foto_name);
		$foto_type = strtolower(end($explode_name));
		$directory = "../image/".$foto_name;
		if(in_array($foto_type,$types_allowed)){
			if($size < 3000000){
				move_uploaded_file($tmp_name,$directory);
				$query = "INSERT INTO foto values (?,?,?,?,?,?,?)";
				$stmt = $conn->prepare($query);
				$stmt->bind_param("issssii",$fotoid,$judulfoto,$deskripsifoto,$tanggalunggah,$foto_name,$albumid,$userid);
				if($stmt->execute()){
					header("location: ../index.php?msg=205");
				}

			}else{
				header("location: ../add-image.php?msg=202");
			}
		}else{
			header("location: ../add-image.php?msg=201");
		}
	}
	
	if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'delete'){
		$fotoid = $_GET['id'];
		$query = mysqli_query($conn,"DELETE FROM foto WHERE fotoid = $fotoid");
		if($query){
			header("location: ../index.php?msg=501");
		}
	}
	if(isset($_POST['search-image'])){
		$search = $_POST['search'];
		if($search){
			header("location: ../index.php?search=$search");
		}else{
			header("location: ../index.php");
		}
	}
 ?>