<?php
//session_start();
//header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset=utf-8");

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;




$users = $_POST['correo'];
$id=$_POST['nombre'];


if (!empty($users) && !empty($id))
{ 
try {
    $mail = new PHPMailer(true);

    //$mail->isSMTP();
    $mail->Host = 'mail.unircredencial.com.ar';
    $mail->SMTPAuth = true;
    $mail->Username = '_mainaccount@unircredencial.com.ar';
    $mail->Password = '8qTWH(8cC3p.c2';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;
    $mail->Timeout = 30;
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'quoted-printable';

    $mail->setFrom('_mainaccount@unircredencial.com.ar', 'Credencial social');
    $mail->AddAddress("unircredencial@gmail.com", "Administrador");
    //$mail->AddAddress("alexander.antoima@gmail.com", "Administrador");

    $mail->isHTML(true);
    $mail->Subject = 'Usuario e identificador unico';
    $mail->Body = 'Solicitud de credencial del usuario: ' . $id . ' y su correo es: ' . $users;
    $mail->AltBody = 'Hola, te doy tus datos.';

    $mail->send();

    // $datos = array(
    //     'estado' => "false",
    //     'nombre' => "Probando erro forzado 12"
    // );
    // echo json_encode($datos, JSON_FORCE_OBJECT);
    // die;

    $estado = 'true';
    $nombre = 'Mensaje enviado correctamente';
} catch (Exception $e) {
    $estado = 'false';
    $nombre = 'Error: ' . $e->getMessage() . ' + ' . $mail->ErrorInfo;
}

$datos = array(
    'estado' => $estado,
    'nombre' => $nombre
);
echo json_encode($datos, JSON_FORCE_OBJECT);
die;	
}
?>