<?php

	include 'auth_mail.php';

	$username = $_POST['username'];
	$password = $_POST['password'];
	//database conection
	$conn = mysqli_connect('localhost','root','','gerenciadordb');
	if($conn->connect_error){
		die('Connection Failed : ' .$conn->connect_error);
	}else{
		$query= mysqli_query($conn , "SELECT * FROM usuario WHERE nomeUsuario = '".$username."' AND senha = '".$password."'");	
		if (!$query){
			die('Error: ' . mysqli_error($conn));
    			}
		if($query->num_rows == 0){
  	 	   echo "account not found";   
		}else{
			$email_address = mysqli_fetch_assoc($query)['email'];
			$aut_code = rand(100000, 999999);
			sendEmail($email_address, $username, $aut_code);
			setcookie("Username",$username, time() + 3600, "/");
			setcookie("Password",$password, time() + 3600, "/");
			header('Location: ../../front-end/home.html');
		}
	}
	$conn->close();
	$query->close();
	exit();
?>