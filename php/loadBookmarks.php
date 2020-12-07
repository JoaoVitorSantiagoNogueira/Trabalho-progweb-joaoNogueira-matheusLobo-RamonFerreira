<?php
	$username = $_POST['username'];
    $password = $_POST['password'];
    $search   = $_POST['search'];
	//database conection
	$conn = mysqli_connect('localhost','root','','gerenciadordb');
	if($conn->connect_error){
		die('Connection Failed : ' .$conn->connect_error);
	}else{
		$query= mysqli_query($conn , "SELECT url FROM url 
                                      WHERE usuarioID = (SELECT id FROM usuario WHERE nomeUsuario = '".$username."' AND senha = '".$password."')
                                      AND url LIKE '%".$search."%'");	
		if (!$query){
			die('Error: ' . mysqli_error($conn));
    			}
		if($query->num_rows > 0){
            while ($row = mysqli_fetch_assoc($query))
            {
                echo "<p>";
                echo $row['url'];
                echo "<p>";
            }
		}else{
            echo "<p>";
            echo "no match ;~;";
            echo "<p>";
		   exit;
		}
	}
	$conn->close();
	$query->close();
?>