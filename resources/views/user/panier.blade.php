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
        
        .cart-container {
            max-width-7xl: 1200px;
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
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="bg-white text-gray-800 py-4 px-8 shadow-sm">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold gold-text font-serif">LUXE</h1>
            <div class="flex items-center space-x-6">
                <a href="{{ route('dashboard.products') }}" class="hover:text-d4af37">
                    <i class="fas fa-home mr-1"></i> Accueil
                </a>
                <a href="{{ route('cart.index') }}" class="relative hover:text-d4af37">
                    <i class="fas fa-shopping-cart"></i>
                    @if(Cart::count() > 0)
                        <span class="absolute -top-2 -right-2 bg-d4af37 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                            {{ Cart::count() }}
                        </span>
                    @endif
                </a>
            </div>
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
                        {{ $item->name }} : 1 x {{ number_format($item->price, 2) }} DH
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
                            <p>{{Cart::subtotal(), 2}} MAD</p>
                            <p>Gratuite</p>
                            <p class="text-2xl font-bold gold-text mt-2">{{ Cart::total(), 2 }} MAD</p>
                        </div>
                    </div>
                    
                    <div class="mt-6 flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('dashboard.products') }}" 
                           class="px-6 py-3 border border-gray-300 rounded-md text-center hover:bg-gray-100 transition">
                           Continuer vos achats
                        </a>
                        <a href="{{ route('checkout') }}" 
                           class="px-6 py-3 border border-gray-300 rounded-md text-center hover:bg-gray-100 transition">
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
        <div class="max-w-7xl mx-auto px-8 text-center">
            <p>&copy; {{ date('Y') }} Luxe Jewelry. Tous droits réservés.</p