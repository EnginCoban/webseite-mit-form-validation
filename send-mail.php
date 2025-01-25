<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap_uebungen.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Balsamiq+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Lobster&family=Mouse+Memoirs&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Pacifico&family=Quicksand:wght@300..700&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&family=Tangerine:wght@400;700&display=swap"
        rel="stylesheet">

</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>

<?php

// Autoloading PHPMailer
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

if (isset($_POST['submit'])) {
    #POST Variablen werden getrimmt und in Variablen gespeichert
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    $subject = trim($_POST['subject']);
    $name = trim($_POST['name']);
    #$recaptcha = $_POST['6Ld1V7YqAAAAADTEc1VYSHMFpX_IAC4DjLfXEus4'];
    $error  = false;
    $errorMessages = [
        '<div class="alert alert-danger text-break text-center  m-0" role="alert">Email ist ein Pflichtfeld!</div>',
        '<div class="alert alert-danger text-break text-center  m-0" role="alert">Falsche E-Mail-Formatierung!</div>',
        '<div class="alert alert-danger text-break text-center  m-0" role="alert">Nachricht ist ein Pflichtfeld!</div>',
        '<div class="alert alert-danger text-break text-center  m-0" role="alert">Datenschutz ist ein Pflichtfeld!</div>',
         '<div class="alert alert-danger text-break text-center  m-0" role="alert">Recaptcha ist ein Pflichtfeld!</div>'
    ];
    #Prüfung ob das Email Feld leer ist, falls ja wird Error ausgegeben
    if (empty($email)) {

        $error = true;
        $_SESSION['alertEmail'] = $errorMessages[0];
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        #echo '<div class="alert alert-danger text-break text-center display-6 m-0" role="alert">Falsche E-Mail-Formatierung!</div>';
        #echo '<div class="d-grid col-12 mx-auto"><a class="btn btn-dark text-break  role="button"  href="contact-bootstrap.php">zurück</a></div>';
        $error = true;
        $_SESSION['alertEmail'] = $errorMessages[1];
    } else {
        #Bei richtigem Format wird gefilterte Email in SESSION-Variable gespeichert
        $_SESSION['emailValue'] = filter_var($email, FILTER_SANITIZE_EMAIL);
    }
    if (empty($message)) {

        $error = true;
        $_SESSION['alertMessage'] = $errorMessages[2];
    } else {
        $_SESSION['messageValue'] = filter_var($message, FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if (!isset($_POST['privacyPolicy'])) {
        $error = true;
        $_SESSION['alertPolicy'] = $errorMessages[3];
    } else {

        $_SESSION['privacyPolicy'] = 'checked';
    }
    /*if (!isset($_POST['6Ld1V7YqAAAAADTEc1VYSHMFpX_IAC4DjLfXEus4'])) {
        $error = true;
        $_SESSION['alertRecaptcha'] = $errorMessages[4];
    }
    else{
        $_SESSION['recaptchaValue'] = $recaptcha;
    }*/
    if ($error) {
        #isset($_SESSION['alertEmail']) || isset($_SESSION['alertMessage']) || isset($_SESSION['alertPolicy'])
        header('Location: contact-bootstrap.php');
        exit();
    }

    // Wenn Felder nicht leer sind, dann E-Mail validieren
    else {

        // Wenn alles okay ist, sichere die Eingabewerte
        $safeEmail = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $safeMessage = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
        $safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $safeSubject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');

        // Verhindert Zeilenumbrüche in Headern
        $safeEmail = preg_replace('/[\r\n]+/', '', $safeEmail);
        $safeName = preg_replace('/[\r\n]+/', '', $safeName);
        $safeSubject = preg_replace('/[\r\n]+/', '', $safeSubject);

        try {
            // Servereinstellungen
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Setze den SMTP-Server
            $mail->SMTPAuth = true;
            $mail->Username = include 'username.php';  // Dein SMTP-Benutzername
            $mail->Password = include 'password.php';  // Dein SMTP-Passwort
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Empfänger
            $mail->setFrom($safeEmail, $safeName);
            $mail->addAddress(include 'username.php', 'Name');
            
            // Inhalt der E-Mail
            $mail->isHTML(true);
            $mail->Subject = $safeSubject;
            $mail->Body    = $safeMessage;

            $mail->send();
            echo '<p class="display-6 text-center text-break p-3 m-0 alert alert-success">Nachricht wurde gesendet!</p>';
            echo '
            <div class="d-grid col-12 mx-auto "><a class="btn btn-dark text-break  role="button"  href="contact-bootstrap.php">zurück</a></div>';
            session_unset();
            $_SESSION['alertPolicy'] = '';
        } catch (Exception $e) {
            echo "Nachricht konnte nicht gesendet werden. Fehler: {$mail->ErrorInfo}";
        }
    }
}




?>