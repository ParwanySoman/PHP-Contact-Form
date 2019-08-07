<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'parwanysoman@gmail.com';                     // SMTP username
    $mail->Password   = 'cbneoxvbxbwbaykq';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('parwanysoman@gmail.com', $newName);
    $mail->addAddress('parwanysoman@gmail.com');     // Add a recipient
    $mail->addReplyTo('parwanysoman@gmail.com', 'Information');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $newEmail;
    $mail->Body    = $newComment;
    $mail->AltBody = $newComment;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>