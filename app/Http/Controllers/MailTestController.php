<?php

namespace App\Http\Controllers;

use App\Services\MailServices;

class MailTestController extends Controller
{
    public function test()
    {
        try {
            $mailService = new MailServices();

            $to = 'destinataire@example.com'; // Mets une vraie adresse ici pour tester
            $subject = 'Test PHPMailer depuis Laravel';
            $body = '<h2>Bonjour !</h2><p>Ceci est un email de test envoyé via PHPMailer.</p>';
            $from = 'tonadresse@gmail.com';   // L’adresse utilisée pour le SMTP

            $sent = $mailService->sendEmail($to, $subject, $body, $from);

            if ($sent) {
                return "✅ Email envoyé avec succès !";
            } else {
                return "❌ Échec de l’envoi.";
            }
        } catch (\Throwable $e) {
            return "Erreur : " . $e->getMessage();
        }
    }
}
