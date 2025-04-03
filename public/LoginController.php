<?php

public function login(Request $request)
{
    $credentials = $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard'); // Redirige vers l’admin
        } else {
            return redirect()->route('user.dashboard'); // Redirige vers l’utilisateur
        }
    }

    return back()->withErrors(['username' => 'Identifiants incorrects']);
}

?>