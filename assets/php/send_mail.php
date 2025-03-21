<?php
// filepath: c:\Users\Work\Desktop\Web1\My Portfolio\send_email.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'kottimokhtar@gmail.com'; 
        $mail->Password = 'Mokhtar29886134'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port = 587; // SMTP port (e.g., 587 for TLS, 465 for SSL)

        // Email settings
        $mail->setFrom($email, $fullname); // Sender's email and name
        $mail->addAddress('your-email@example.com'); // Replace with your receiving email
        $mail->Subject = "New message from $fullname";
        $mail->Body = "Name: $fullname\nEmail: $email\n\nMessage:\n$message";

        // Send the email
        $mail->send();
        echo 'Message sent successfully!';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo 'Invalid request method.';
}
?>