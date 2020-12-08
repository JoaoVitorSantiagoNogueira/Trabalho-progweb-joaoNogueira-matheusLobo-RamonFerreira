<?php
	$username = $_POST['username'];
    $password = $_POST['password'];
    $title   = $_POST['title'];
    $url = $_POST['url'];
    //echo "entrou";
	//database conection
	$conn = mysqli_connect('localhost','root','','gerenciadordb');
	if($conn->connect_error){
		die('Connection Failed : ' .$conn->connect_error);
	}else{
        $user_id = mysqli_query($conn , "SELECT id FROM usuario WHERE nomeUsuario = '".$username."' AND senha = '".$password."')");

        $query = mysqli_query($conn , "SELECT titulo, url FROM url 
                                      WHERE usuarioID = $user_id
                                      AND(
										  url LIKE '%".$url."%' OR
										  titulo LIKE '%".$title."%'
										  );");	
		if (!$query){
			die('Error: ' . mysqli_error($conn));
    			}
		if($query->num_rows > 0){
            echo "<p>";
            echo "Este bookmark já está salvo!";
            echo "<p>";
		}else{
            $insertion = mysqli_query($conn, "INSERT INTO `url` (title, `url`, usuarioID) VALUES ('".$title."'", $url, $user_id));
            echo "<p>";
            echo "Adicionado!";
            echo "<p>";
		}
	}
	$conn->close();
    $query->close();
    $user_id->close();
    $insertion->close();
    exit();
?>