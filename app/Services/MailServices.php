<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class MailServices
{
    public function sendEmail($to, $subject, $body, $fromEmail)
    {
        $mail = new PHPMailer(true);

        try {
            // Paramètres du serveur SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Remplace par ton serveur SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'hamdaouifatimezzahra16@gmail.com'; // Remplace par ton email SMTP
            $mail->Password = 'ljxdpatgivxbbcmg';  // Ton mot de passe
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // En-têtes
            $mail->setFrom($fromEmail, 'Nom');
            $mail->addAddress($to);  // Adresse destinataire

            // Contenu de l'email
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $body;

            // Envoi du mail
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
