<?php
    echo "z";
	$username = $_GET['username'];
	$email = $_GET['email'];
	//database conection
	$conn = mysqli_connect('localhost','root','','gerenciadordb');
	if($conn->connect_error){
        echo "d";
		die('Connection Failed : ' .$conn->connect_error);
	}else{
		$query= mysqli_query($conn , "SELECT * FROM usuario WHERE email = '".$email."'");	
		if (!$query){
            echo "c";
			die('Error: ' . mysqli_error($conn));
    			}
		if($query->num_rows == 0){
            echo "a";
            $password = rand(100000,99999999);
            $cadastro = mysqli_query($conn, "INSERT INTO usuario (nomeUsuario, senha, email) VALUES ('".$username."', '".$password."', '".$email."')");
            setcookie("Username",$username, time() + 3600, "/");
            setcookie("Password",$password, time() + 3600, "/");
            header('Location: ../home.html');   
		}else{
            echo "b";
            $password = mysqli_fetch_assoc($query)['password'];
			setcookie("Username",$username, time() + 3600, "/");
			setcookie("Password",$password, time() + 3600, "/");
			header('Location: ../home.html');
		}
	}
	$conn->close();
	$query->close();
	exit();
?>