
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxe Jewelry - Produits</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap');
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f9f7f5;
            color: #333;
            padding-top: 80px;
        }
        
        .product-card {
            transition: all 0.3s ease;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border: 1px solid rgba(0,0,0,0.05);
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        
        .product-image {
            height: 200px;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #d4af37;
            font-size: 3rem;
        }
        
        .product-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: #2c3e50;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .collection-tag {
            display: inline-block;
            background-color: #f0f0f0;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            margin-top: 5px;
        }
        
        .action-btn {
            transition: all 0.2s;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
        }
        
        .edit-btn {
            background-color: #f8f9fa;
            color: #2c3e50;
            border: 1px solid #e0e0e0;
        }
        
        .edit-btn:hover {
            background-color: #e9ecef;
            border-color: #d4af37;
            color: #d4af37;
        }
        
        .delete-btn {
            background-color: #fdecea;
            color: #c0392b;
            border: 1px solid #f5c6cb;
        }
        
        .delete-btn:hover {
            background-color: #f5c6cb;
        }
        
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: center;
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
                <li><a href="{{ route('login') }}" class="fas fa-user mr-2">Connexion</a> 
                </button></li>
                
               
            </div>
        </div>
    </nav>
    
    <main class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-serif font-bold mb-4 gold-text">Nos Produits</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">Des pièces uniques conçues avec passion</p>
            </div>

            @if (session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $item)
                <div class="product-card">
                    <div class="relative">
                        <div class="product-image">
                            <i class="fas fa-gem"></i>
                        </div>
                        <span class="product-badge">#{{ $item->id }}</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">{{ $item->nom }}</h3>
                        <p class="text-gray-600 mb-3">{{ Str::limit($item->description, 80) }}</p>
                        
                        <div class="flex justify-between items-center mb-3">
                            <div>
                                <span class="font-bold text-lg">{{ number_format($item->prix, 2) }} MAD</span>
                                <span class="block text-sm text-gray-500">{{ $item->stock }} en stock</span>
                            </div>
                            <span class="collection-tag">{{ $item->collection->nom }}</span>
                        </div>
                        
                        <div class="flex space-x-3 pt-4 border-t border-gray-100">
                            <a href="{{ route('product.edit', ['product' => $item]) }}" 
                               class="action-btn edit-btn flex-1 text-center">
                               <i class="fas fa-edit mr-1"></i> Modifier
                            </a>
                            <form method="post" 
                                  action="{{ route('product.delete', ['product' => $item]) }}" 
                                  class="flex-1"
                                  onsubmit="return confirm('Supprimer ce produit?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="action-btn delete-btn w-full">
                                    <i class="fas fa-trash-alt mr-1"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Add Product Button -->
            <div class="mt-12 text-center">
                <a href="{{ route('product.create') }}" 
                   class="inline-block bg-d4af37 text-white px-8 py-3 rounded-lg hover:bg-b5952e transition font-medium">
                   <i class="fas fa-plus-circle mr-2"></i> Ajouter un produit
                </a>
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