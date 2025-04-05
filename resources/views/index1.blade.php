<?php
// Simuler un tableau de produits
$produits = [
    ['nom' => 'Bague en Or', 'description' => 'Bague en or 18 carats avec diamant', 'prix' => 450, 'image' => '../site_eco/images/IMG-20250323-WA0006.jpg'],
    ['nom' => 'Collier en Argent', 'description' => 'Collier en argent sterling avec pendentif', 'prix' => 280, 'image' => '../site_eco/images/IMG-20250328-WA0012.jpg'],
    ['nom' => 'Bracelet en Platine', 'description' => 'Bracelet élégant en platine', 'prix' => 620, 'image' => '../site_eco/images/IMG-20250328-WA0038.jpg'],
    ['nom' => 'Boucles d\'Oreilles', 'description' => 'Boucles d\'oreilles en or blanc avec perles', 'prix' => 320, 'image' => '../site_eco/images/IMG-20250328-WA0033.jpg'],
    ['nom' => 'Montre Luxe', 'description' => 'Montre suisse en or rose', 'prix' => 1200, 'image' => '../site_eco/images/IMG-20250328-WA0045.jpg'],
    ['nom' => 'Chaîne en Or', 'description' => 'Chaîne en or jaune 14 carats', 'prix' => 380, 'image' => '../site_eco/images/IMG-20250328-WA0044.jpg'],
    ['nom' => 'Bague de Fiançailles', 'description' => 'Bague diamant solitaire 1 carat', 'prix' => 2500, 'image' => '../site_eco/images/IMG-20250328-WA0042.jpg']
];

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

<?php
$collectionDescription = ["L'éclat incomparable des diamants"
,"Nos pièces en argent sterling les plus raffinées"
, "Nos plus belles pièces en or 18 carats"];
?>


<?php
$collectionTitle =['Collection Argent','Collection Or',
    'Collection Diamants'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxe Jewelry - Bijoux de Luxe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap');
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f9f7f5;
            color: #333;
        }

        p{
            margin: auto;
            padding: auto;
        }
        
        .header-background {
            position: relative;
            width: 100%;
            height: 80vh;
            overflow: hidden;
        }
        
        .header-background img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 1.25s ease-in-out;
        }
        
        .header-background img.active {
            opacity: 1;
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .gold-text {
            color: #d4af37;
        }
        
        .gold-bg {
            background-color: #d4af37;
        }
        
        .gold-border {
            border-color: #d4af37;
        }
        
        .hover-gold:hover {
            color: #d4af37;
        }
        
        
        
        .nav-link {
            position: relative;
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #d4af37;
            transition: width 0.3s;
        }
        
        .nav-link:hover:after {
            width: 100%;
        }
    

        .newsletter {
            background-color: #f8f8f8;
            padding: 40px;
            text-align: center;
        }
        .newsletter input[type="email"] {
            padding: 10px;
            width: 300px;
            margin: 10px 0;
        }
        .newsletter button {
            background-color: #000;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
       
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="bg-white text-gray-800 py-4 px-8 shadow-sm fixed w-full z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold gold-text font-serif">LUXE</h1>
        
            <div class="flex items-center space-x-4">         
                 <div class="flex space-x-4">
                    <a href="{{ route('register') }}" class="bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-full transition font-medium">
                        <i class="fas fa-user mr-2"></i>Connexion
                    </a>
                    <a href="{{ route('login') }}" class="gold-bg hover:bg-yellow-600 text-white px-4 py-2 rounded-full transition font-medium">
                        <i class="fas fa-user-plus mr-2"></i>Inscription
                    </a>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <section class="header-background mt-16">
        <img src="../site_eco/images/IMG-20250323-WA0006.jpg" class="active" alt="Diaporama 1">
        <img src="../site_eco/images/IMG-20250328-WA0012.jpg" alt="Diaporama 2">
        <img src="../site_eco/images/IMG-20250328-WA0016.jpg" alt="Diaporama 3">
        <div class="hero-overlay"></div>
        <div class="hero-content h-full flex flex-col justify-center items-center text-center px-4">
            <h2 class="text-5xl md:text-6xl font-serif font-bold text-white mb-4">Bijoux Exceptionnels</h2>
            <p class="text-xl text-white mb-8 max-w-2xl">Découvrez notre collection exclusive de bijoux artisanaux</p>
        </div>
        
    </section><br>
    <h2 class="text-center text-2xl "> Nouveautés Bijouterie-x BIJOUX</h2>
<br><p >
  Les mains expertes de nos 150 artisans maîtrisent les bons gestes, transforment la matière et réalisent entre 10 et 40 étapes de fabrication pour que chaque bijou raconte une histoire, révèle une personnalité et incarne un savoir-faire unique et propre à émerveiller les amoureux de l’art .</p><br>
 <p> Nous propose des créations uniques de bijoux. L’expression créative du directrice artistique, GOUHI KARIMA, n’a de cesse de se réinventer en proposant des collections pour femme aux histoires surprenantes et inattendues, dans le respect de la biodiversité. Bijouterie-x Bijoux, c’est aussi une gamme de bracelets et de bagues pour homme , des bijoux « Les Essentiels » pour vous accompagner au quotidien.</p><br>

    <!-- Newsletter -->
    <section class="py-16 bg-gray-800 text-white">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-serif font-bold mb-4">Abonnez-vous à notre newsletter</h2>
            <p class="text-gray-300 mb-8">Recevez en exclusivité nos nouvelles collections et offres spéciales</p>
            <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                <input type="email" placeholder="Votre email" class="flex-grow px-4 py-3 rounded-full text-gray-800 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                <button  type="submit" class="gold-bg text-white px-6 py-3 rounded-full hover:bg-yellow-600 transition font-medium">
                    S'abonner
                </button>
            </div>
        </div>
    </section>
    

    <script>
        // Diaporama
        let index = 0;
        function changeSlide() {
            let images = document.querySelectorAll(".header-background img");
            images.forEach((img, i) => img.classList.remove("active"));
            images[index].classList.add("active");
            index = (index + 1) % images.length;
        }
        setInterval(changeSlide, 5000);
                  
        
    </script>
</body>
</html>