<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier - Luxe Jewelry</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap');
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f9f7f5;
        }

        .gold-text {
            color: #d4af37;
        }

        .quantity-btn {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #e2e8f0;
            background: white;
            cursor: pointer;
            transition: all 0.3s;
        }

        .quantity-btn:hover {
            background: #f8fafc;
            border-color: #d4af37;
        }
        :root {
            --gold: #d4af37;
            --dark: #2c3e50;
            --light-bg: #f9f7f5;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f9f7f5;
            color: #333;
            padding-top: 76px; /* Ajustement précis pour la hauteur de la barre */
        }

        .jewelry-logo {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            letter-spacing: 1px;
            position: relative;
            display: inline-flex;
            align-items: center;
            color: var(--dark);
            text-transform: uppercase;
            transition: all 0.3s ease;
            height: 40px; /* Hauteur fixe pour stabilité */
        }

        .jewelry-logo::before {
            content: "";
            position: absolute;
            width: 25px;
            height: 25px;
            background: var(--gold);
            border-radius: 50%;
            top: -8px;
            left: -15px;
            z-index: -1;
            opacity: 0.3;
            transition: transform 0.3s ease;
        }

        .jewelry-logo::after {
            content: "";
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, var(--gold), transparent);
            transition: width 0.3s ease;
        }

        .jewelry-logo:hover {
            color: var(--gold);
        }

        .jewelry-logo:hover::before {
            transform: scale(1.2);
        }

        .jewelry-logo:hover::after {
            width: 90%;
        }

        .gold-text {
            color: var(--gold);
            margin-right: 2px; /* Espacement lettre J */
        }

    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="bg-white text-gray-800 py-3 px-6 shadow-sm fixed top-0 left-0 w-full z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="/" class="jewelry-logo text-xl md:text-2xl">
                <span class="gold-text">J</span>EWELRY
            </a>
            
            <ul class="hidden md:flex items-center space-x-6">
                <li>
                <a href="{{ route('dashboard.products') }}" class="hover:text-d4af37">
                    <i class="fas fa-home mr-1"></i> Accueil
                </a>
                </li>
                <a href="{{ route('cart.index') }}" class="relative hover:text-d4af37">
                    <i class="fas fa-shopping-cart"></i>
                    @if(Cart::count() > 0)
                        <span class="absolute -top-2 -right-2 bg-d4af37 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                            {{ Cart::count() }}
                        </span>
                    @endif
                </a>
            </ul>
        </div>
    </nav>
   

    <!-- Cart Section -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-serif font-bold gold-text mb-8">Votre Panier</h2>

            @if(Cart::count() > 0)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <!-- Cart Items -->
                <div class="divide-y divide-gray-200">
                    @foreach(Cart::content() as $item)
                    <div class="p-6">
                        {{ $item->name }} : {{ $item->qty }} x {{ number_format($item->price, 2) }} MAD
                    </div>
                    @endforeach
                </div>  

                <!-- Cart Summary -->
                <div class="p-6 bg-gray-50 border-t border-gray-200">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-600">Sous-total</p>
                            <p class="text-gray-600">Livraison</p>
                            <p class="text-lg font-bold mt-2">Total</p>
                        </div>
                        <div class="text-right">
                            <p>{{ (float) Cart::subtotal() }} MAD</p>
                            <p>Gratuite</p>
                            <p class="text-2xl font-bold gold-text mt-2">{{ (float) Cart::subtotal() }} MAD</p>
                        </div>
                    </div>

                    <div class="mt-6 flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('dashboard.products') }}" 
                           class="px-6 py-3 border border-gray-300 rounded-md text-center hover:bg-gray-100 transition">
                           Continuer vos achats
                        </a>
                        <a href="{{ route('checkout') }}" 
                           class="px-6 py-3 bg-d4af37 text-white rounded-md text-center hover:bg-yellow-600 transition">
                           Passer la commande
                        </a>
                    </div>
                </div>
            </div>
            @else
            <div class="bg-white rounded-lg shadow-md p-12 text-center">
                <i class="fas fa-shopping-cart text-5xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Votre panier est vide</h3>
                <p class="text-gray-600 mb-6">Découvrez nos collections et trouvez des bijoux qui vous ressemblent</p>
                <a href="{{ route('dashboard.products') }}" 
                   class="inline-block px-6 py-3 bg-d4af37 text-white rounded-md hover:bg-yellow-600 transition">
                   Commencer vos achats
                </a>
            </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold text-white mb-4">
                        <a href="/" class="jewelry-logo hover:text-gold-500">
                            <span class="gold-text">J</span>EWELRY
                        </a>
                    </h3>
                    <p class="mb-4">Bijoux de luxe artisanaux depuis 1985</p>
                    <div class="mt-4 flex justify-center items-center space-x-4">
                        <a href="https://www.facebook.com" target="_blank" class="hover-gold">
                            <i class="fab fa-facebook-f text-2xl"></i>
                        </a>
                        <a href="https://www.instagram.com" target="_blank" class="hover-gold">
                            <i class="fab fa-instagram text-2xl"></i>
                        </a>
                        <a href="https://www.pinterest.com" target="_blank" class="hover-gold">
                            <i class="fab fa-pinterest text-2xl"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-white font-medium mb-4">Boutique</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover-gold">Nouveautés</a></li>
                        <li><a href="#" class="hover-gold">Montres</a></li>
                        <li><a href="#" class="hover-gold">Cadeaux</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-medium mb-4">Service Client</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover-gold">Contact</a></li>
                        <li><a href="#" class="hover-gold">Livraison</a></li>
                        <li><a href="#" class="hover-gold">FAQ</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-medium mb-4">Contact</h4>
                    <address class="not-italic">
                        <p class="mb-2">123 Avenue Montaigne</p>
                        <p class="mb-2">75008 Paris, Rabat</p>
                        <p class="mb-2"><i class="fas fa-phone-alt mr-2"></i>+212 651 57 65 97</p>
                        <p><i class="fas fa-envelope mr-2"></i> contact@jewelry.com</p>
                    </address>
                </div>
            </div>

           
        </div>
        <pre>



        
        </pre>
    </footer>
</body>
</html>
