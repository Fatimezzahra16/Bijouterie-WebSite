<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MailServices;

class ContactController extends Controller
{
    protected $mailService;

    public function __construct(MailServices $mailService)
    {
        $this->mailService = $mailService;
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $to = 'hamdaouifatimezzahra16@example.com'; // Adresse de réception
        $subject = 'Message du formulaire de contact';
        $body = "Nom: {$validated['name']}\nEmail: {$validated['email']}\nMessage:\n{$validated['message']}";
        $fromEmail = $validated['email'];

        if ($this->mailService->sendEmail($to, $subject, $body, $fromEmail)) {
            return back()->with('success', 'Message envoyé avec succès');
        } else {
            return back()->with('error', 'Échec de l\'envoi du message');
        }
    }
}
