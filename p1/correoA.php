<?php
//session_start();
?>
<?php
//header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset=utf-8");

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$users = $_POST['correo'];
$id=$_POST['nombre'];
$foto=$_POST['foto'];

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
    $mail->addAddress($users, $id);
    $mail->AddAddress('unircredencial@gmail.com', 'Copia del titular');

    $mail->isHTML(true);
    $mail->Subject = 'su usuario e identificador unico';
    $mail->Body = 'Datos generados, usuario: ' . $id . ' y correo: ' . $users;
    //$mail->AltBody = 'Hola, te doy tus datos.';

    if (file_exists($foto)) {
        $mail->AddAttachment($foto, 'Credencial');
    } else {
        $datos = array(
            'estado' => 'Desconocido',
            'nombre' => 'NO existe'  
            );		
            echo json_encode($datos,JSON_FORCE_OBJECT);
            die;
    }

    $mail->send();

    $estado = 'true';
    $nombre = 'Mensaje enviado correctamente';
} catch (Exception $e) {
    $estado = 'false';
    $nombre = 'Error: ' . $e->getMessage();
}

$datos = array(
    'estado' => $estado,
    'nombre' => $nombre
);

echo json_encode($datos, JSON_FORCE_OBJECT);

die;
	
}


?>