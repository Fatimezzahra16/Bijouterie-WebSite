<?php
// Simuler un tableau de produits
$produits = [
    ['nom' => 'Bague en Or', 'description' => 'Bague en or 18 carats avec diamant', 'prix' => 450, 'image' => 'IMG-20250328-WA0040.jpg'],
    ['nom' => 'Collier en Argent', 'description' => 'Collier en argent sterling avec pendentif', 'prix' => 280, 'image' => 'IMG-20250328-WA0038.jpg'],
    ['nom' => 'Bracelet en Platine', 'description' => 'Bracelet élégant en platine', 'prix' => 620, 'image' => 'IMG-20250328-WA0054.jpg'],
    ['nom' => 'Boucles d\'Oreilles', 'description' => 'Boucles d\'oreilles en or blanc avec perles', 'prix' => 320, 'image' => 'IMG-20250328-WA0049.jpg'],
 ['nom' => 'Montre Luxe', 'description' => 'Montre suisse en or rose', 'prix' => 1200, 'image' => 'IMG-20250328-WA0043.jpg'],
    ['nom' => 'Chaîne en Or', 'description' => 'Chaîne en or jaune 14 carats', 'prix' => 380, 'image' => 'IMG-20250328-WA0039.jpg'],
    ['nom' => 'Bague de Fiançailles', 'description' => 'Bague diamant solitaire 1 carat', 'prix' => 2500, 'image' => 'IMG-20250328-WA0041.jpg']
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
               
                <li><a href="#" class="nav-link hover-gold">Bijoux</a></li>
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
    
    <!-- Produits de la collection -->
    <main class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
            </div>
            <!-- Contenu spécifique à la page de connexion -->
    <main class="pt-16 min-h-screen">
        <div class="flex flex-col justify-center py-12 sm:px-6 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <h2 class="text-center text-3xl font-serif font-bold text-gray-900">
                    Se connecter / S'inscrire
                </h2>
            </div>

            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                    <!-- Bouton Google -->
                    <div class="mb-6">

                        <button class="w-full flex justify-center items-center px-4 py-3 rounded-md btn-google">          
                            <img src="/site_eco/images/google.png" alt="google" class="w-10 h-10 rounded-full border-2 border-white ">  
                            <a href="https://www.gmail.com" target="_blank" class="font-medium hover-gold">Se connecter avec Google</a>
                        </button>
                    </div>

                    <div class="relative mb-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">ou</span>
                        </div>
                    </div>

                    <form class="space-y-6" action="traitement-connexion.php" method="POST">
                        <!-- Champ Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                Identifiant ou e-mail *
                            </label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" autocomplete="email" required
                                    class="appearance-none block w-full px-3 py-2 border input-field rounded-md shadow-sm placeholder-gray-400 focus:outline-none sm:text-sm">
                            </div>
                        </div>

                        <!-- Champ Mot de passe -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">
                                Mot de passe *
                            </label>
                            <div class="mt-1">
                                <input id="password" name="password" type="password" autocomplete="current-password" required
                                    class="appearance-none block w-full px-3 py-2 border input-field rounded-md shadow-sm placeholder-gray-400 focus:outline-none sm:text-sm">
                            </div>
                        </div>

                        <!-- Options -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox"
                                    class="h-4 w-4 text-gold-600 focus:ring-gold-500 border-gray-300 rounded">
                                <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                                    Se souvenir de moi
                                </label>
                            </div>

                            <div class="text-sm">
                                <a href="/site_eco/mot_pass_oublier.php" class="font-medium hover-gold">
                                    Mot de passe perdu ?
                                </a>
                            </div>
                        </div>

                        <!-- Bouton de connexion -->
                        <div>
                            <button type="submit"
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white gold-bg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                SE CONNECTER
                            </button>
                        </div>
                    </form>

                    <!-- Lien vers l'inscription -->
                   
                </div>
            </div>
        </div>
    </main>
           
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