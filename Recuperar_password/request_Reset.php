<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'config.php';

if(isset($_POST['correo'])){

    $emailTo = $_POST['correo'];

    $code = uniqid(true);
    $query = mysqli_query($con, "INSERT INTO resetpasswords(code, email) VALUES ('$code', '$emailTo')");
    if (!$query){
        exit("Error");
    }

$mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'gestionambientes6@gmail.com';           //SMTP username
        $mail->Password   = 'nqjyennuswgvokhw';                       //SMTP password
        $mail->SMTPSecure = 'ssl';                                  //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('kevinrasanchez31@gmail.com', 'gestion ambientes');
        $mail->addAddress($emailTo);     //Add a recipient

        //Content
        $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetPassword.php?code=$code";
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Link para recuperar tu contraseña';
        $mail->Body    = "<h1>Este es el link para cambiar tu contraseña</h1>
                            Dale <a href='$url'>Click aquí para dirigirte</a>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'El link para cambiar la contraseña se acaba de enviar a tu correo electronico, Revise por favor';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    exit();
};

?>

<form action="" method="POST">
    <input type="email" name="correo" placeholder="Correo Electronico" autocomplete="off">
    <br>
    <input type="submit" name="submit">
</form>