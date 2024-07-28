<?php
    include "mail-settings.php";

    $mail->ClearAllRecipients();
    $mail->AddAddress("dantecc10@gmail.com");
    $mail->AddCC("marine.projectbysn@outlook.com");
    $mail->AddCC("marine.projectbysn@gmail.com");
    $mail->AddCC("g.millan@bmdesign.mx");

    $mail->IsHTML(true);  // Podemos activar o desactivar HTML en el mensaje
    $mail->Subject = 'Solicitud de informes';
    include "functions.php";
    $contact = '<p>Para responder al cliente, tiene estas opciones:</p>
            <ul>
            <li>WhatsApp: <a href="https://wa.me/52'.$_POST['phone'].'">'.$_POST['phone'].'</a></li>
            <li>Teléfono: <a href="tel:'.$_POST['phone'].'">'.$_POST['phone'].'</a></li>
            <li>Correo electrónico: <a href="mailto:'.$_POST['email'].'">'.$_POST['email'].'</a></li>
            </ul>';
    $msg = ("<h1>".$_POST['name']." solicita informes</h1>
    <p>Han solicitado contacto. Este es el mensaje: </p>".prepare_msg($_POST['message']).$contact);


    $mail->Body = $msg;

    try {
        $mail->Send();
    } catch (Exception $e) {
    }

    $mail->ClearAllRecipients();
    $mail->AddAddress($_POST['email']);

    $mail->IsHTML(true);  // Podemos activar o desactivar HTML en el mensaje
    $mail->Subject = '¡Hemos recibido su mensaje!';
    $msg = ("<h1>Estamos para servirle, ".$_POST['name']."</h1>
        <p>Tenemos sus datos de contacto y pronto un integrante de nuestro equipo responderá su solicitud.</p>
        <p>¡Gracias por elegirnos para colaborar con usted y hacer su proyecto realidad!</p>");

    $mail->Body = $msg;

    try {
        $mail->Send();
    } catch (Exception $e) {
    }

    header("Location: ../index.php");
    