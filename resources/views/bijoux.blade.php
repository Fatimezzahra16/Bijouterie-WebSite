<?php
$pageTitle = "Bijoux de Luxe";
$pageDescription = "Découvrez notre collection exclusive de bijoux artisanaux";

$produits = [
    ['nom' => 'Bague en Or', 'description' => 'Bague en or 18 carats avec diamant', 'prix' => 450, 'image' => '/site_eco/images/IMG-20250328-WA0073.jpg'],
    ['nom' => 'Collier en Argent', 'description' => 'Collier en argent sterling avec pendentif', 'prix' => 280, 'image' => '/site_eco/images/IMG-20250328-WA0039.jpg'],
    ['nom' => 'Bague en Or', 'description' => 'Bague en or 18 carats avec diamant', 'prix' => 450, 'image' => '../site_eco/images/IMG-20250323-WA0006.jpg'],
    ['nom' => 'Collier en Argent', 'description' => 'Collier en argent sterling avec pendentif', 'prix' => 280, 'image' => '../site_eco/images/IMG-20250328-WA0012.jpg'],
 ['nom' => 'Boucles d\'Oreilles', 'description' => 'Boucles d\'oreilles en or blanc avec perles', 'prix' => 320, 'image' => '/site_eco/images/IMG-20250328-WA0067.jpg'],
    ['nom' => 'Montre Luxe', 'description' => 'Montre suisse en or rose', 'prix' => 1200, 'image' => '/site_eco/images/IMG-20250328-WA0060.jpg'],
    ['nom' => 'Bague en Or', 'description' => 'Bague en or 18 carats avec diamant', 'prix' => 450, 'image' => '/site_eco/images/IMG-20250328-WA0073.jpg'],
    ['nom' => 'Collier en Argent', 'description' => 'Collier en argent sterling avec pendentif', 'prix' => 280, 'image' => '/site_eco/images/IMG-20250328-WA0039.jpg']
];
// Nombre de produits par page
$produitsParPage = 6;

// Calculer le nombre total de pages
$totalPages = ceil(count($produits) / $produitsParPage);

// Récupérer la page actuelle via l'URL, sinon la page 1 par défaut
$pageActuelle = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$pageActuelle = max(1, min($totalPages, $pageActuelle));

// Calculer l'index de départ pour la pagination
$indexDepart = ($pageActuelle - 1) * $produitsParPage;

// Extraire les produits pour la page actuelle
$produitsPageActuelle = array_slice($produits, $indexDepart, $produitsParPage);

include 'templates/header.php';
include 'templates/navbar.php';
?>

<section class="header-background mt-16">
    <img src="../site_eco/images/IMG-20250323-WA0006.jpg" class="active" alt="Bijoux de luxe">
    <div class="hero-overlay"></div>
    <div class="hero-content h-full flex flex-col justify-center items-center text-center px-4">
        <h2 class="text-5xl md:text-6xl font-serif font-bold text-white mb-4">Nos Bijoux</h2>
        <p class="text-xl text-white mb-8 max-w-2xl">Collection exclusive de bijoux artisanaux</p>
    </div>
</section>

<main class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <!-- Section produits (identique à votre index.php) -->
        <?php include 'templates/product-grid.php'; ?>
    </div>
</main>

<?php 
include 'templates/newsletter.php';
include 'templates/footer.php';
?>