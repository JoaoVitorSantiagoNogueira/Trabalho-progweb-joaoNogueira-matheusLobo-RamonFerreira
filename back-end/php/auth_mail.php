<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require_once "/opt/vendor/autoload.php";
    
    function sendEmail($email_address, $username, $aut_code){

        //PHPMailer Object
        $mail = new PHPMailer(true); //Argument true in constructor enables exceptions

        //connection informations
        $mail-> isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username = 'semlinksemlikeofficial@gmail.com';
        $mail->Password = 'semlinksemlike';
        $mail->Port = 587;

        //From email address and name
        $mail->From = "semlinksemlikeofficial@gmail.com";
        $mail->FromName = "Sem Link Sem Like";

        //To address and name
        $mail->addAddress($email_address, $username);

        //Send HTML or Plain Text email
        $mail->isHTML(false);

        $mail->Subject = "Tentativa de login Sem Link Sem Like";
        $mail->Body = "Seu código de autenticação é:\n$aut_code";

        try {
            $mail->send();
            //echo "Message has been sent successfully";
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }
?>