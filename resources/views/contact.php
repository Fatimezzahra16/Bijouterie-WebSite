<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "hamdaouifatimezzahra16@gmail.com"; // ✅ Remplace par ton vrai email
    $subject = "Message du formulaire de contact";
    
    // Sécurisation et récupération des données
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

    // Contenu du message
    $body = "Nom: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message\n";

    // Envoi
    if (mail($to, $subject, $body, $headers)) {
        echo "Message envoyé avec succès !";
    } else {
        echo "Échec de l'envoi. Réessayez plus tard.";
    }
}
?>
