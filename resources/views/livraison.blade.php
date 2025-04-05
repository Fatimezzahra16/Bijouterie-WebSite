
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
<nav class="bg-white text-gray-800 py-4 px-8     <!-- Contenu spécifique à la page Nouveautés -->
shadow-sm fixed w-full z-50">
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
    
    <!-- Hero Section -->
    <section class="header-background mt-16">
        <img src="../site_eco/images/IMG-20250323-WA0006.jpg" class="active" alt="Diaporama 1">
        <img src="../site_eco/images/IMG-20250328-WA0012.jpg" alt="Diaporama 2">
        <img src="../site_eco/images/IMG-20250328-WA0016.jpg" alt="Diaporama 3">
        <div class="hero-overlay"></div>
        <div class="hero-content h-full flex flex-col justify-center items-center text-center px-4">
            <h2 class="text-5xl md:text-6xl font-serif font-bold text-white mb-4">Livraison</h2>
            <p class="text-xl text-white mb-8 max-w-2xl">Découvrez nos methode de livraison possible </p>
        </div>
        
    </section>
   
 <br><h3 class="text-2xl"> Pour profiter d’une livraison gratuite la livraison en magasin est disponible toute l’année</h3>
<p>Avec 10 magasins au Maroc, il y en a forcément un près de chez vous. Profitez-en ! En choisissant de faire livrer votre commande dans un magasin EXIST, vous bénéficiez de la gratuité des frais de livraison quel que soit le montant de votre achat.</p><br>

<p>L’équipe du magasin sera ravie de vous accueillir pour vous remettre votre colis.
</p><br>
<p>Quel que soit le mode de livraison choisi, en magasin ou à l’adresse de votre choix, vous recevrez votre colis au maximum dans les 5 jours ouvrés (hors week-end et jours fériés) suivant le jour de votre commande.</p><br>

<p>Ce délai de livraison inclut les temps de préparation de votre commande, d’expédition et de livraison par un transporteur privé ou bien les services de la poste marocaine.</p><br>

<p>Bénéficiez également de frais de port gratuits en choisissant de faire livrer votre colis dans l’un des magasins EXIST.</p><br>

<h3 class="text-2xl">Une livraison à Domicile</h3>
<p>Livraison à domicile uniquement par AMANA, vous n’aurez qu’à confirmer le destinataire, votre adresse complète et votre code postal.
Vous recevrez votre colis à l’adresse indiquée via AMANA. Les frais d’expédition sont facturés une seule fois par commande, quel que soit le nombre d’articles que comporte votre commande.</p><br>

<p>Les frais de livraison selon le montant de la commande :</p><br
<p>Inférieur à 800 Dirhams : 40 Dirhams </p><br> 

<p>De 800 Dirhams et plus : livraison gratuite</p><br>
                
        <?php 
include 'templates/newsletter.php';
include 'templates/footer.php';
?>        
   
</body>
</html>