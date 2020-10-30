<?php
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
		   //place holder
  	 	   echo "account not found";   
		}else{
		   //place holder
		   //echo "logging in";
		   header('Location: ../home.html');
		   exit;
		}
	}
	$conn->close();
	$query->close();
?>