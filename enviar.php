<?php

$nombre = $_POST["nombre"];
$mail = $_POST["mail"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["message"];

$body = "Nombre: " . $nombre . "<br>Mail: " . $mail . "<br>Telefono: " . $telefono . "<br>Mensaje: " . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'cursohmtlrnh@gmail.com';                     // SMTP username
    $mail->Password   = '0Ih^A2GB@i';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('cursohmtlrnh@gmail.com', 'rnhidalgowebCURSO');
    $mail->addAddress('rnhidalgo@gmail.com');     // Add a 

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Mensaje de Pagina Web xxxx';
    $mail->Body    = $body;
    $mail->CharSet = 'UTF-8';

    $mail->send();
    echo '<script>
        alert("El mensaje se envió correctamente");
        window.history.go(-1);
        </script>';
} catch (Exception $e) {
    echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
}