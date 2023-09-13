<?php
require 'mailer/src/PHPMailer.php';
require 'mailer/src/SMTP.php';
require 'mailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF; // Turn off debugging
        $mail->isSMTP();
        $mail->Host = 'namecheap.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'info@sunbrimpremium.site'; // Your email address
        $mail->Password = 'Tonylee@1998'; // Your email password
        $mail->SMTPSecure = 'tls'; // TLS or SSL
        $mail->Port = 587; // Port number

        // Recipients
        $mail->setFrom('your@email.com', 'Your Name'); // Your email address and name
        $mail->addAddress('info@sunbrimpremium.site', 'SunBrim'); // Recipient's email address and name

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "Name: $name<br>Email: $email<br>Message: $message";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
