<?php
	$username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

	//database conection
	$conn = mysqli_connect('localhost','root','','gerenciadordb');
	if($conn->connect_error){
		die('Connection Failed : ' .$conn->connect_error);
	}else{
		$query= mysqli_query($conn , "SELECT * FROM usuario WHERE email = '".$email."'");	
		if (!$query){
			die('Error: ' . mysqli_error($conn));
    			}
		if($query->num_rows == 0){
		   $cadastro = mysqli_query($conn, "INSERT INTO usuario (nomeUsuario, senha, email) VALUES ('".$username."', '".$password."', '".$email."')");
		   setcookie("Username",$username, time() + 3600, "/");
		   setcookie("Password",$password, time() + 3600, "/");
           header('Location: ../../front-end/home.html');
		}else{
		   echo "Email ja cadastrado";
		   //header('Location: ../home.html');
		}
	}
	$conn->close();
	$query->close();
	exit();
?>