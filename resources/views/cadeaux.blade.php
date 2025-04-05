<?php
$pageTitle = "Cadeaux Luxueux";
$pageDescription = "Trouvez le cadeau parfait pour vos proches";

$produits = [
    ['nom' => 'Coffret Cadeau Or', 'description' => 'Coffret cadeau contenant une sélection de bijoux', 'prix' => 750, 'image' => '../site_eco/images/image.jpg'], ['nom' => 'Boucles d\'Oreilles', 'description' => 'Boucles d\'oreilles en or blanc avec perles', 'prix' => 320, 'image' => '../site_eco/images/IMG-20250328-WA0033.jpg'],
    ['nom' => 'Montre Luxe', 'description' => 'Montre suisse en or rose', 'prix' => 1200, 'image' => '../site_eco/images/IMG-20250328-WA0045.jpg'],
    ['nom' => 'Chaîne en Or', 'description' => 'Chaîne en or jaune 14 carats', 'prix' => 380, 'image' => '../site_eco/images/IMG-20250328-WA0044.jpg']
];

include 'templates/header.php';
include 'templates/navbar.php';

// Nombre de produits par page
$produitsParPage = 6;

// Calculer le nombre total de pages
$totalPages = ceil(count($produits) / $produitsParPage);

// Récupérer la page actuelle via l'URL, sinon la page 1 par défaut
$pageActuelle = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$pageActuelle = max(1, min($totalPages, $pageActuelle)); // Limiter la page aux valeurs valides

// Calculer l'index de départ pour la pagination
$indexDepart = ($pageActuelle - 1) * $produitsParPage;

// Extraire les produits pour la page actuelle
$produitsPageActuelle = array_slice($produits, $indexDepart, $produitsParPage);

?>

<section class="header-background mt-16">
    <img src="/site_eco/images/IMG-20250328-WA0042.jpg" class="active" alt="Cadeaux de luxe">
    <div class="hero-overlay"></div>
    <div class="hero-content h-full flex flex-col justify-center items-center text-center px-4">
        <h2 class="text-5xl md:text-6xl font-serif font-bold text-white mb-4">Idées Cadeaux</h2>
        <p class="text-xl text-white mb-8 max-w-2xl">Des présents qui marquent les esprits</p>
    </div>
</section>

<main class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <?php include 'templates/product-grid.php'; ?>
    </div>
</main>

<?php 
include 'templates/newsletter.php';
include 'templates/footer.php';
?>