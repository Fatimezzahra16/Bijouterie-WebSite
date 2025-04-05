<?php
$pageTitle = "Nos Collections";
$pageDescription = "Découvrez nos différentes collections de bijoux";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Inclure le même CSS que la page principale -->
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
        .footer {
            display: flex;
            justify-content: space-around;
            padding: 40px;
            background-color: #fff;
        }
        .footer-column {
            flex: 1;
            padding: 0 20px;
        }
        .footer-column h3 {
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        .footer-column ul {
            list-style: none;
            padding: 0;
        }
        .footer-column ul li {
            margin: 10px 0;
        }
        .footer-column ul li a {
            text-decoration: none;
            color: #333;
        }
        .footer-column ul li a:hover {
            text-decoration: underline;
        }
        .copyright {
            text-align: center;
            padding: 20px;
            background-color: #f8f8f8;
        }
    </style>
</head>
<body>
<nav class="bg-white text-gray-800 py-4 px-8 shadow-sm fixed w-full z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold gold-text font-serif">LUXE</h1>          
            <ul class="hidden md:flex space-x-8">
                <li><a href="../site_eco/index.php" class="nav-link hover-gold">Accueil</a></li>       
                <li><a href="/site_eco/bijoux.php" class="nav-link hover-gold">Bijoux</a></li>
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


<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-serif font-bold mb-4">Nos Collections</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Découvrez nos gammes de bijoux soigneusement sélectionnés</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Collection Or -->
            <div class="relative h-96 overflow-hidden rounded-lg group">
                <img src="chemin-image-or.jpg" class="w-full h-full object-cover transition duration-500 group-hover:scale-105" alt="Collection Or">
                <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                    <div class="text-center p-6">
                        <h3 class="text-2xl font-serif font-bold text-white mb-2">Collection Or</h3>
                        <a href="collections/or.php" class="px-6 py-2 bg-white text-gray-800 rounded-full hover:bg-gray-100 transition inline-block">Voir</a>
                    </div>
                </div>
            </div>
            
            <!-- Collection Argent -->
            <div class="relative h-96 overflow-hidden rounded-lg group">
                <img src="chemin-image-argent.jpg" class="w-full h-full object-cover transition duration-500 group-hover:scale-105" alt="Collection Argent">
                <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                    <div class="text-center p-6">
                        <h3 class="text-2xl font-serif font-bold text-white mb-2">Collection Argent</h3>
                        <a href="collections/argent.php" class="px-6 py-2 bg-white text-gray-800 rounded-full hover:bg-gray-100 transition inline-block">Voir</a>
                    </div>
                </div>
            </div>
            
            <!-- Collection Diamants -->
            <div class="relative h-96 overflow-hidden rounded-lg group">
                <img src="chemin-image-diamants.jpg" class="w-full h-full object-cover transition duration-500 group-hover:scale-105" alt="Collection Diamants">
                <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                    <div class="text-center p-6">
                        <h3 class="text-2xl font-serif font-bold text-white mb-2">Collection Diamants</h3>
                        <a href="collections/diamants.php" class="px-6 py-2 bg-white text-gray-800 rounded-full hover:bg-gray-100 transition inline-block">Voir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="py-16 bg-gray-800 text-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-serif font-bold mb-4">Abonnez-vous à notre newsletter</h2>
        <p class="text-gray-300 mb-8">Recevez en exclusivité nos nouvelles collections et offres spéciales</p>
        
        <form action="newsletter-subscribe.php" method="POST" class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
            <input type="email" name="email" placeholder="Votre email" required
                   class="flex-grow px-4 py-3 rounded-full text-gray-800 focus:outline-none focus:ring-2 focus:ring-yellow-500">
            <button type="submit" class="gold-bg text-white px-6 py-3 rounded-full hover:bg-yellow-600 transition font-medium">
                S'abonner
            </button>
        </form>
        
        <p class="mt-4 text-xs text-gray-400">
            En vous abonnant, vous acceptez notre <a href="confidentialite.php" class="underline hover-gold">politique de confidentialité</a>.
        </p>
    </div>
</section>
<footer class="bg-gray-900 text-gray-300 py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-serif font-bold text-white mb-4">LUXE</h3>
                    <p class="mb-4">Bijoux de luxe artisanaux depuis 1985</p>
                    <div class="mt-4 flex justify-center items-center space-x-4">
                    <a href="https://www.facebook.com" target="_blank">
                    <img src="../site_eco/images/acebook-iconf.png" alt="Facebook" class="w-10 h-10 rounded-full border-2 border-black">
                    </a>
                    <a href="https://www.instagram.com" target="_blank">
                    <img src="../site_eco/images/instagram-icon.jpg" alt="Instagram" class="w-10 h-10 rounded-full border-2 border-black">
                    </a>
                    <a href="https://www.pinterest.com" target="_blank">
                      <img src="../site_eco/images/téléchargement.png" alt="pinterest" class="w-10 h-10 rounded-full border-2 border-black">
                      </a>
                    </div>
                </div>
                <div>
                    <h4 class="text-white font-medium mb-4">Boutique</h4>
                    <ul class="space-y-2">
                        <li><a href="../site_eco/nouveautes.php" class="hover-gold">Nouveautés</a></li>
                        <li><a href="../site_eco/montres.php" class="hover-gold">Montres</a></li>
                        <li><a href="../site_eco/cadeaux.php" class="hover-gold">Cadeaux</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-white font-medium mb-4">Service Client</h4>
                    <ul class="space-y-2">
                        <li><a href="../site_eco/contact.php" class="hover-gold">Contact</a></li>
                        <li><a href="../site_eco/livraison.php" class="hover-gold">Livraison</a></li>
                        <li><a href="../site_eco/retours.php" class="hover-gold">Retours</a></li>
                        <li><a href="../site_eco/faq.php" class="hover-gold">FAQ</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-white font-medium mb-4">Contact</h4>
                    <address class="not-italic">
                        <p class="mb-2">123 Avenue Montaigne</p>
                        <p class="mb-2">75008 Paris, France</p>
                        <p class="mb-2"><i class="fas fa-phone-alt mr-2"></i> +33 1 23 45 67 89</p>
                        <p><i class="fas fa-envelope mr-2"></i> contact@luxe-jewelry.com</p>
                    </address>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-sm">
                <p>&copy; 2023 Luxe Jewelry. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
