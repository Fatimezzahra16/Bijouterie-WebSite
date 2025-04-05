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
        
    </section>
    
   <!-- Featured Collections -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-serif font-bold mb-4">Nos Collections</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Découvrez nos gammes de bijoux soigneusement sélectionnés</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="relative h-96 overflow-hidden rounded-lg group">
                <img src="../site_eco/images/image.jpg" class="w-full h-full object-cover transition duration-500 group-hover:scale-105" alt="Collection Or">
                <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                    <div class="text-center p-6">
                        <h3 class="text-2xl font-serif font-bold text-white mb-2">Collection Or</h3>
                        <a href="collections/or.php" class="px-6 py-2 bg-white text-gray-800 rounded-full hover:bg-gray-100 transition inline-block">Voir</a>
                    </div>
                </div>
            </div>
            
            <div class="relative h-96 overflow-hidden rounded-lg group">
                <img src="https://images.unsplash.com/photo-1605100804763-247f67b3557e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="w-full h-full object-cover transition duration-500 group-hover:scale-105" alt="Collection Argent">
                <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                    <div class="text-center p-6">
                        <h3 class="text-2xl font-serif font-bold text-white mb-2">Collection Argent</h3>
                        <a href="collections/argent.php" class="px-6 py-2 bg-white text-gray-800 rounded-full hover:bg-gray-100 transition inline-block">Voir</a>
                    </div>
                </div>
            </div>
            
            <div class="relative h-96 overflow-hidden rounded-lg group">
                <img src="../site_eco/images/imag.jpg" class="w-full h-full object-cover transition duration-500 group-hover:scale-105" alt="Collection Or">
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
    
    <!-- Produits -->
    <main class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-serif font-bold mb-4">Nos Créations</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Des pièces uniques conçues avec passion</p>
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
    
    <!-- Pied de page -->
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
                        <li><a href="contact.php" class="hover-gold">Contact</a></li>
                        <li><a href="livraison.php" class="hover-gold">Livraison</a></li>
                        <li><a href="retours.php" class="hover-gold">Retours</a></li>
                        <li><a href="hover-gold.php" class="hover-gold">FAQ</a></li>
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
        
        // Panier
        let cartItems = [];
        let cartCount = 0;
        
        function toggleCart() {
            const cart = document.getElementById('cart');
            cart.classList.toggle('hidden');
        }
        
        function ajouterAuPanier(nom, prix) {
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
            
            // Afficher le total
            const total = cartItems.reduce((sum, item) => sum + item.prix, 0);
            const totalLi = document.createElement('li');
            totalLi.className = 'py-2 font-bold flex justify-between';
            totalLi.innerHTML = `
                <span>Total</span>
                <span>${total.toFixed(2)} €</span>
            `;
            cartItemsList.appendChild(totalLi);
            
            // Ajouter un bouton de checkout
            const checkoutBtn = document.createElement('button');
            checkoutBtn.className = 'w-full mt-4 gold-bg text-white py-2 rounded hover:bg-yellow-600';
            checkoutBtn.textContent = 'Commander';
            cartItemsList.appendChild(checkoutBtn);
            
            // Animation
            const cartBtn = document.querySelector('[onclick="toggleCart()"]');
            cartBtn.classList.add('animate-bounce');
            setTimeout(() => {
                cartBtn.classList.remove('animate-bounce');
            }, 1000);
        }
    </script>

     <script>
        let index = 0;
        function changeSlide() {
            let images = document.querySelectorAll(".header-background img");
            images.forEach((img, i) => img.classList.remove("active"));
            images[index].classList.add("active");
            index = (index + 1) % images.length;
        }
        setInterval(changeSlide, 3000);
    </script>
</body>
</html>