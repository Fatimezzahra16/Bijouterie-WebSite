<?php
// Simuler un tableau de produits
$produits = [
    ['nom' => 'Bague en Or', 'description' => 'Bague en or 18 carats avec diamant', 'prix' => 450, 'image' => '../site_eco/images/IMG-20250328-WA0040.jpg'],
    ['nom' => 'Collier en Argent', 'description' => 'Collier en argent sterling avec pendentif', 'prix' => 280, 'image' => '../site_eco/images/IMG-20250328-WA0038.jpg'],
    ['nom' => 'Bracelet en Platine', 'description' => 'Bracelet élégant en platine', 'prix' => 620, 'image' => '../site_eco/images/IMG-20250328-WA0054.jpg'],
    ['nom' => 'Boucles d\'Oreilles', 'description' => 'Boucles d\'oreilles en or blanc avec perles', 'prix' => 320, 'image' => '../site_eco/images/IMG-20250328-WA0049.jpg'],
 ['nom' => 'Montre Luxe', 'description' => 'Montre suisse en or rose', 'prix' => 1200, 'image' => '../site_eco/images/IMG-20250328-WA0043.jpg'],
    ['nom' => 'Chaîne en Or', 'description' => 'Chaîne en or jaune 14 carats', 'prix' => 380, 'image' => '../site_eco/images/IMG-20250328-WA0039.jpg'],
    ['nom' => 'Bague de Fiançailles', 'description' => 'Bague diamant solitaire 1 carat', 'prix' => 2500, 'image' => '../site_eco/images/IMG-20250328-WA0041.jpg']
];

// Nombre de produits par page
$produitsParPage = 6;

// Calculer le nombre total de pages
$totalPages = ceil(count($produits ) / $produitsParPage);

// Récupérer la page actuelle via l'URL, sinon la page 1 par défaut
$pageActuelle = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$pageActuelle = max(1, min($totalPages, $pageActuelle));

// Calculer l'index de départ pour la pagination
$indexDepart = ($pageActuelle - 1) * $produitsParPage;

// Extraire les produits pour la page actuelle
$produitsPageActuelle = array_slice($produits , $indexDepart, $produitsParPage);

include 'templates/header.php';
include 'templates/navbar.php';
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxe Jewelry </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap');
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f9f7f5;
            color: #333;
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
        
        .product-card {
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
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
        
        /* Styles pour le slider */
        .hero-slider {
            position: relative;
            height: 80vh;
            overflow: hidden;
            margin-top: 76px;
        }
        
        .hero-slide {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }
        
        .hero-slide.active {
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
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
        }
        
        .slider-nav {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
            z-index: 20;
            transform: translateY(-50%);
        }
        
        .slider-btn {
            background-color: rgba(255, 255, 255, 0.5);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .slider-btn:hover {
            background-color: rgba(255, 255, 255, 0.8);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="bg-white text-gray-800 py-4 px-8 shadow-sm fixed w-full z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold gold-text font-serif">LUXE</h1>
            
            <ul class="hidden md:flex space-x-8">
                <li><a href="../site_eco/index.php" class="nav-link hover-gold">Accueil</a></li>
               
                <li><a href="../site_eco/bijoux.php" class="nav-link hover-gold">Bijoux</a></li>
                <li><a href="../site_eco/montres.php" class="nav-link hover-gold">Montres</a></li>
                <li><a href="cadeaux.php" class="nav-link hover-gold">Cadeaux</a></li>
            </ul>
            
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button class="hover-gold" onclick="toggleCart()">
                        <i class="fas fa-shopping-bag text-xl"></i>
                        <span id="cart-count" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
                    </button>
                    <div id="cart" class="hidden absolute right-0 mt-2 w-72 bg-white text-gray-800 p-4 rounded shadow-lg border border-gray-100">
                        <h2 class="text-lg font-bold border-b pb-2">Votre Panier</h2>
                        <ul id="cart-items" class="mt-2"></ul>
                    </div>
                </div>
                
                 <button class="px-2 py-2 text-sm rounded-full border border-gray-300 hover:border-gold hover-gold transition">
                <li><a href="../site_eco/Connexion.php" class="fas fa-user mr-2">Connexion</a> 
                </button></li>
              
            </div>
        </div>
    </nav>
    
    <!-- Hero Slider -->
    <section class="hero-slider" >
        <!-- Images du diaporama -->
        <img src='../site_eco/images/IMG-20250328-WA0049.jpg' class="hero-slide active">
        <img src= '../site_eco/images/IMG-20250328-WA0043.jpg' class="hero-slide active">
        <!-- Overlay sombre -->
        <div class="hero-overlay"></div>
        
        <!-- Contenu texte -->
        <div class="hero-content px-4">
            <h1 class="text-4xl md:text-5xl font-serif font-bold mb-4"> Decouvrire Nos Montres</h1>
        </div>
         <!-- Navigation -->
        <div class="slider-nav">
            <button class="slider-btn slider-prev">
                <i class="fas fa-chevron-left text-gray-800"></i>
            </button>
            <button class="slider-btn slider-next">
                <i class="fas fa-chevron-right text-gray-800"></i>
            </button>
        </div>
       
    </section>
    
    <!-- Produits de la collection -->
    <main class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-serif font-bold mb-4">Nos Pièces des Montres spécial</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Des créations uniques </p>
            </div>
            
            <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($produitsPageActuelle as $produit): ?>
                    <div class="product-card rounded-lg overflow-hidden">
                        <div class="relative overflow-hidden h-64">
                            <img src="<?= $produit['image'] ?>" alt="<?= $produit['nom'] ?>" class="w-full h-full object-cover transition duration-500 hover:scale-110">
                            <div class="absolute top-4 right-4">
                                <button class="bg-white p-2 rounded-full shadow-md hover:bg-gray-100">
                                    <i class="far fa-heart text-gray-600"></i>
                                </button>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2"><?= $produit['nom'] ?></h3>
                            <p class="text-gray-600 mb-4"><?= $produit['description'] ?></p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold gold-text"><?= number_format($produit['prix'], 2) ?> €</span>
                                <button onclick="ajouterAuPanier('<?= $produit['nom'] ?>', <?= $produit['prix'] ?>)" class="px-4 py-2 gold-bg text-white rounded-full hover:bg-yellow-600 transition flex items-center">
                                    <i class="fas fa-shopping-bag mr-2"></i> Ajouter
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                <nav class="flex space-x-2">
                    <?php if ($pageActuelle > 1): ?>
                        <a href="?page=<?= $pageActuelle - 1 ?>" class="px-4 py-2 border border-gray-300 rounded-full hover:bg-gray-100 transition">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="?page=<?= $i ?>" class="px-4 py-2 border <?= $i == $pageActuelle ? 'gold-border bg-gold-50 text-yellow-600' : 'border-gray-300' ?> rounded-full hover:bg-gray-100 transition">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>

                    <?php if ($pageActuelle < $totalPages): ?>
                        <a href="?page=<?= $pageActuelle + 1 ?>" class="px-4 py-2 border border-gray-300 rounded-full hover:bg-gray-100 transition">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    <?php endif; ?>
                </nav>
            </div>
        </div>
    </main>
    
   
<?php 
include 'templates/newsletter.php';
include 'templates/footer.php';
?>
    <script>
        // Gestion du diaporama
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.hero-slide');
            let currentIndex = 0;
            let interval;
            
            function showSlide(index) {
                slides.forEach(slide => slide.classList.remove('active'));
                slides[index].classList.add('active');
                currentIndex = index;
            }
            
            function nextSlide() {
                const nextIndex = (currentIndex + 1) % slides.length;
                showSlide(nextIndex);
            }
            
            function prevSlide() {
                const prevIndex = (currentIndex - 1 + slides.length) % slides.length;
                showSlide(prevIndex);
            }
            
            // Navigation manuelle
            document.querySelector('.slider-next').addEventListener('click', function() {
                nextSlide();
                resetInterval();
            });
            
            document.querySelector('.slider-prev').addEventListener('click', function() {
                prevSlide();
                resetInterval();
            });
            
            function startInterval() {
                interval = setInterval(nextSlide, 5000);
            }
            
            function resetInterval() {
                clearInterval(interval);
                startInterval();
            }
            
            // Démarrer le diaporama
            if (slides.length > 1) {
                startInterval();
            }
            
            // Gestion du panier
            let cartItems = [];
            let cartCount = 0;
            
            window.toggleCart = function() {
                const cart = document.getElementById('cart');
                cart.classList.toggle('hidden');
            }
            
            window.ajouterAuPanier = function(nom, prix) {
                cartItems.push({ nom, prix });
                cartCount++;
                document.getElementById('cart-count').textContent = cartCount;
                
                const cartItemsList = document.getElementById('cart-items');
                cartItemsList.innerHTML = '';
                
                cartItems.forEach(item => {
                    const li = document.createElement('li');
                    li.className = 'py-2 border-b border-gray-100 flex justify-between';
                    li.innerHTML = `
                        <span>${item.nom}</span>
                        <span>${item.prix} €</span>
                    `;
                    cartItemsList.appendChild(li);
                });
                
                const total = cartItems.reduce((sum, item) => sum + item.prix, 0);
                const totalLi = document.createElement('li');
                totalLi.className = 'py-2 font-bold flex justify-between';
                totalLi.innerHTML = `
                    <span>Total</span>
                    <span>${total.toFixed(2)} €</span>
                `;
                cartItemsList.appendChild(totalLi);
                
                const checkoutBtn = document.createElement('button');
                checkoutBtn.className = 'w-full mt-4 gold-bg text-white py-2 rounded hover:bg-yellow-600';
                checkoutBtn.textContent = 'Commander';
                cartItemsList.appendChild(checkoutBtn);
                
                const cartBtn = document.querySelector('[onclick="toggleCart()"]');
                cartBtn.classList.add('animate-bounce');
                setTimeout(() => {
                    cartBtn.classList.remove('animate-bounce');
                }, 1000);
            }
        });
    </script>
</body>
</html>