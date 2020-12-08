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
        if($id_query = mysqli_query($conn , "SELECT id FROM usuario WHERE nomeUsuario = '".$username."' AND senha = '".$password."';")){
            $row = mysqli_fetch_assoc($id_query);
            $user_id = $row['id'];
        }else{
            echo "Erro : ", mysqli_error($conn);
            exit();
        }
     
        $query = mysqli_query($conn , "SELECT titulo, url FROM url 
                                      WHERE usuarioID = '".$user_id."'
                                      AND(
										  url = '".$url."' OR
										  titulo = '".$title."'
                                          );");	
                                          
		if (!$query){
			die('Error: ' . mysqli_error($conn));
    			}
		if($query->num_rows > 0){
            echo "Este bookmark já está salvo!";
		}else{
            if($insertion = mysqli_query($conn, "INSERT INTO `url` (titulo, url, usuarioID) VALUES ('".$title."', '".$url."', '".$user_id."');")){
                echo "Adicionado!";
            }
            else{
                echo "Erro: ", mysqli_error($conn);
            }
		}
	}
	$conn->close();
    exit();
?>