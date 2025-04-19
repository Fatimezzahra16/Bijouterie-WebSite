<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

public function login(Request $request)
{
    // Validation des champs de connexion
    $credentials = $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    // Tentative d'authentification
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); // Protection contre les attaques de session fixation

        $user = Auth::user();

        // Redirection selon le rôle de l'utilisateur
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }

    // En cas d'échec, renvoyer avec un message d'erreur
    return back()->withErrors([
        'username' => 'Identifiants incorrects.',
    ])->withInput(); // Garde les anciennes valeurs sauf le mot de passe
}
?>
