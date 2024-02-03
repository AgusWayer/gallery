<?php 
	require 'connect.php';
	if(isset($_POST['add-album'])){
		$albumid = rand(1000,9000);
		$namaalbum = $_POST['namaalbum'];
		$deskripsi = $_POST['deskripsi'];
		$tanggaldibuat = date("Y-m-d");

		$userid = $_POST['userid'];
		$insertAlbum = mysqli_query($conn,"INSERT INTO album VALUES($albumid,'$namaalbum','$deskripsi','$tanggaldibuat',$userid)");
		if($insertAlbum){
			header("location: ../add-album.php?msg=701");
		}
	}

 ?>