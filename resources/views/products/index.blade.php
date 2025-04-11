
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
        /* Product card hover effects */
         .product-card {
             transition: all 0.3s ease;
        }

        .product-card:hover {
           transform: translateY(-5px);
           box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        /* Collection tag style */
        .collection-tag {
             background-color: #f8f9fa;
             color: #4b5563;
             font-size: 0.75rem;
             padding: 0.25rem 0.5rem;
             border-radius: 9999px;
        }

        /* Action buttons */
        .action-btn {
               padding: 0.5rem;
               border-radius: 0.375rem;
               font-size: 0.875rem;
               font-weight: 500;
                 transition: all 0.2s;
        }

        .edit-btn {
              background-color: #f8f9fa;
              color: #374151;
             border: 1px solid #e5e7eb;
        }

        .edit-btn:hover {
            background-color: #e5e7eb;
             border-color: #d4af37;
             color: #d4af37;
            }

        .delete-btn {
           background-color: #fef2f2;
             color: #dc2626;
             border: 1px solid #fecaca;
        }

        .delete-btn:hover {
        background-color: #fecaca;
        }
        /* Form styling */
.filter-form {
    background: white;
    border-radius: 0.5rem;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    border: 1px solid #f0f0f0;
    padding: 1.5rem;
    margin-bottom: 2rem;
}

/* Input fields */
.filter-input {
    width: 100%;
    padding: 0.5rem 1rem 0.5rem 2.5rem;
    border: 1px solid #e2e8f0;
    border-radius: 0.375rem;
    transition: all 0.2s;
}

.filter-input:focus {
    border-color: #d4af37;
    outline: none;
    box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
}

/* Select dropdown */
.filter-select {
    appearance: none;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23a0aec0'%3e%3cpath d='M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z'/%3e%3c/svg%3e");
    background-position: right 0.5rem center;
    background-repeat: no-repeat;
    background-size: 1.5em;
}

/* Submit button */
.filter-button {
    background-color: #d4af37;
    transition: background-color 0.2s;
}

.filter-button:hover {
    background-color: #b5952e;
}
/* Add to your existing styles */
.gold-bg {
    background-color: #d4af37;
    transition: all 0.3s ease;
}

.gold-bg:hover {
    background-color: #b5952e;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(212, 175, 55, 0.3);
}

/* If you need to adjust the button size */
.btn-lg {
    padding: 0.75rem 1.5rem;
    font-size: 1.1rem;
}
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="bg-white text-gray-800 py-4 px-8 shadow-sm fixed w-full z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold gold-text font-serif">LUXE</h1>
            
            <ul class="hidden md:flex space-x-8">
                <li><a href="{{ route('admin.index') }}" class="nav-link hover-gold">Accueil</a></li>
            </ul>   
            </div>
        </div>
    </nav>
    
    <main class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
             <!-- Add Product Button -->
             <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-serif font-bold gold-text">Nos Produits</h2>
                <a href="{{ route('product.create') }}" 
                   class="gold-bg hover:bg-yellow-600 text-white px-6 py-3 rounded-full transition-all duration-300 font-medium flex items-center shadow-md hover:shadow-lg">
                   <i class="fas fa-plus-circle mr-2"></i> Nouveau Produit
                </a>
            </div>
            <form id="search-form" method="GET" action="{{ route('product.index') }}" class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                    <!-- Product Name Search -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nom du produit</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text" 
                                   name="nom" 
                                   placeholder="Rechercher..." 
                                   value="{{ request('nom') }}"
                                   class="pl-10 w-full rounded-md border-gray-300 shadow-sm focus:border-gold-500 focus:ring focus:ring-gold-200 focus:ring-opacity-50 py-2">
                        </div>
                    </div>
            
                    <!-- Collection Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Collection</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-layer-group text-gray-400"></i>
                            </div>
                            <select name="collection_id" 
                                    class="pl-10 w-full rounded-md border-gray-300 shadow-sm focus:border-gold-500 focus:ring focus:ring-gold-200 focus:ring-opacity-50 py-2 appearance-none">
                                <option value="">Toutes les collections</option>
                                @foreach($collections as $collection)
                                    <option value="{{ $collection->id }}" {{ request('collection_id') == $collection->id ? 'selected' : '' }}>
                                        {{ $collection->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            
                    <!-- Price Range -->
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Prix min (MAD)</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                  <!--  <span class="text-gray-400">MAD</span> -->
                                </div>
                                <input type="number" 
                                       name="prix_min" 
                                       placeholder="Min" 
                                       value="{{ request('prix_min') }}"
                                       class="pl-12 w-full rounded-md border-gray-300 shadow-sm focus:border-gold-500 focus:ring focus:ring-gold-200 focus:ring-opacity-50 py-2">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Prix max (MAD)</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <!-- <span class="text-gray-400">MAD</span> -->
                                </div>
                                <input type="number" 
                                       name="prix_max" 
                                       placeholder="Max" 
                                       value="{{ request('prix_max') }}"
                                       class="pl-12 w-full rounded-md border-gray-300 shadow-sm focus:border-gold-500 focus:ring focus:ring-gold-200 focus:ring-opacity-50 py-2">
                            </div>
                        </div>
                    </div>
            
                    <!-- Sort and Stock -->
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Trier par</label>
                            <select name="sort_by" 
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-gold-500 focus:ring focus:ring-gold-200 focus:ring-opacity-50 py-2">
                                <option value="">Par défaut</option>
                                <option value="prix" {{ request('sort_by') == 'prix' ? 'selected' : '' }}>Prix</option>
                                <option value="stock" {{ request('sort_by') == 'stock' ? 'selected' : '' }}>Stock</option>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <label class="inline-flex items-center mt-1">
                                <input type="checkbox" 
                                       name="stock_only" 
                                       {{ request('stock_only') ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-gold-600 shadow-sm focus:border-gold-300 focus:ring focus:ring-gold-200 focus:ring-opacity-50 h-4 w-4">
                                <span class="ml-2 text-sm text-gray-700">En stock</span>
                            </label>
                        </div>
                    </div>
                </div>
            
                <!-- Submit Button -->
                <div class="mt-4 flex justify-end">
                    <button type="submit" 
                            class="bg-gold-600 hover:bg-gold-700 text-white font-medium py-2 px-6 rounded-md transition duration-150 ease-in-out flex items-center">
                        <i class="fas fa-filter mr-2"></i> Appliquer
                    </button>
                </div>
            </form>
            
            

            @if (session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $item)
                <div class="product-card group relative overflow-hidden rounded-lg shadow-md hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="collection-card">
                        <div class="collection-image relative overflow-hidden h-48 bg-gray-100">
                            @if($item->photo)
                                <img src="{{ asset('images/products/' . $item->photo) }}" 
                                     alt="{{ $item->nom }}"
                                     class="w-full h-full object-cover transition duration-300 group-hover:scale-105">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <i class="fas fa-camera fa-3x"></i>
                                </div>
                            @endif
                            <!-- Details overlay button (appears on hover) -->
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                                <a href="{{ route('product.show', $item->id) }}" 
                                   class="bg-white text-gray-800 px-6 py-2 rounded-full font-medium hover:bg-gold-500 hover:text-white transition">
                                   Voir détails <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">{{ $item->nom }}</h3>
                        <p class="text-gray-600 mb-3">{{ Str::limit($item->description, 80) }}</p>
                        
                        <div class="flex justify-between items-center mb-3">
                            <div>
                                <span class="font-bold text-lg">{{ number_format($item->prix, 2) }} MAD</span>
                                <span class="block text-sm text-gray-500">{{ $item->stock }} en stock</span>
                            </div>
                            <span class="collection-tag bg-gray-100 px-3 py-1 rounded-full text-xs">{{ $item->collection->nom }}</span>
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
                        
                        <!-- Additional details link (visible on mobile) -->
                        <div class="mt-4 md:hidden">
                            <a href="{{ route('product.show', $item->id) }}" 
                               class="w-full text-center block bg-gray-100 hover:bg-gray-200 text-gray-800 py-2 px-4 rounded transition">
                               <i class="fas fa-eye mr-2"></i> Voir détails
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
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
        let index1 = 0;
        function changeSlide() {
            let images = document.querySelectorAll(".header-background img");
            images.forEach((img, i) => img.classList.remove("active"));
            images[index1].classList.add("active");
            index1 = (index + 1) % images.length;
        }
        setInterval(changeSlide, 3000);
    </script>
</body>
</html>