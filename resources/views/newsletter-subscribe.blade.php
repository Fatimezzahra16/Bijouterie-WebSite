<?php
// En-tête JSON
header('Content-Type: application/json');

// Vérification de la méthode POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
    exit;
}

// Récupération et validation de l'email
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if (!$email) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Adresse email invalide']);
    exit;
}

// Ici vous devriez ajouter le code pour enregistrer l'email dans votre base de données
// Exemple simplifié :
/*
try {
    $pdo = new PDO('mysql:host=localhost;dbname=votre_base', 'utilisateur', 'motdepasse');
    $stmt = $pdo->prepare('INSERT INTO newsletter (email, date_inscription) VALUES (?, NOW())');
    $stmt->execute([$email]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Erreur de base de données']);
    exit;
}
*/

// Envoi d'un email de confirmation (exemple simplifié)
$to = $email;
$subject = 'Confirmation d\'inscription à la newsletter Luxe Jewelry';
$message = "Merci de vous être abonné à notre newsletter.\n\n";
$message .= "Vous recevrez nos dernières collections et offres exclusives.\n\n";
$message .= "L'équipe Luxe Jewelry";
$headers = 'From: newsletter@luxe-jewelry.com' . "\r\n" .
    'Reply-To: contact@luxe-jewelry.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// mail($to, $subject, $message, $headers); // Décommentez pour activer l'envoi

// Réponse JSON
echo json_encode([
    'success' => true,
    'message' => 'Merci pour votre inscription ! Vous recevrez bientôt nos dernières nouvelles.'
]);