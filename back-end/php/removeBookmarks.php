<?php
	$username = $_POST['username'];
    $password = $_POST['password'];
    $title   = $_POST['title'];
    $url = $_POST['url'];
	//database conection
	$conn = mysqli_connect('localhost','root','','gerenciadordb');
	if($conn->connect_error){
        die('Connection Failed : ' .$conn->connect_error);
        exit();
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
            die('Erro: ' . mysqli_error($conn));
            exit();
    			}
		if($query->num_rows > 0){
            $removal = mysqli_query($conn , "DELETE FROM url 
                                      WHERE usuarioID = '".$user_id."'
                                      AND(
										  url = '".$url."' OR
										  titulo = '".$title."'
                                         );");
            if($removal){
                echo "Bookmark deletado!";
            }else{
                echo "Erro: ", mysqli_error($conn);
                exit();
            }
		}else{
            echo "Este bookmark não existe!";
		}
	}
	$conn->close();
    exit();
?>