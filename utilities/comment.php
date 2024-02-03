<?php
	require 'connect.php';
	if(isset($_POST['submit-comment'])){
		$komentarid = rand(1000,5000)
		$fotoid = $_POST['fotoid'];
		$userid = $_POST['userid'];
		$isikomentar = $_POST['isikomentar'];
		$tanggalkomentar = date("")
		$comment = htmlspecialchars($_POST['comment']);
	}
 ?>