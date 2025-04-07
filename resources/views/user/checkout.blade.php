<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de commande - Luxe Jewelry</title>
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
        
        .confirmation-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.03);
        }
        
        .btn-gold {
            background-color: #d4af37;
            transition: all 0.3s ease;
        }
        
        .btn-gold:hover {
            background-color: #c19b2e;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.2);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation (same as your other pages) -->
    <nav class="bg-white text-gray-800 py-4 px-8 shadow-sm">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold gold-text font-serif">LUXE</h1>
            <a href="{{ route('dashboard.products') }}" class="flex items-center text-gray-700 hover:text-d4af37">
                <i class="fas fa-arrow-left mr-2"></i> Retour aux produits
            </a>
        </div>
    </nav>

    <!-- Confirmation Section -->
    <section class="py-16">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-check-circle text-5xl text-green-500"></i>
                </div>
                <h2 class="text-4xl font-serif font-bold gold-text mb-4">Confirmer votre commande</h2>
                <p class="text-gray-600">Veuillez vérifier les détails avant validation</p>
            </div>
            
            <div class="confirmation-card p-8 md:p-10">
                <!-- Order Summary -->
                <div class="mb-8">
                    <h3 class="text-xl font-serif font-semibold mb-4 border-b pb-2">Récapitulatif</h3>
                    <div class="space-y-4">
                        @foreach(Cart::content() as $item)
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="font-medium">{{ $item->name }}</p>
                                <p class="text-sm text-gray-500">{{ $item->qty }} × {{ number_format($item->price, 2) }} MAD</p>
                            </div>
                            <p class="font-medium">{{ number_format($item->price * $item->qty, 2) }} MAD</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Total Section -->
                <div class="border-t border-gray-200 pt-6 mb-8">
                    <div class="flex justify-between mb-2">
                        <span>Sous-total</span>
                        <span>{{ Cart::subtotal(), 2 }} MAD</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Livraison</span>
                        <span>Gratuite</span>
                    </div>
                    <div class="flex justify-between text-lg font-bold mt-4">
                        <span>Total</span>
                        <span class="gold-text">{{ Cart::total(), 2 }} MAD</span>
                    </div>
                </div>
                
                <!-- Payment Form -->
                <form action="/checkout/valider" method="POST">
                    @csrf
                    
                    <!-- Payment Method Selection -->
                    <div class="mb-8">
                        <h3 class="text-xl font-serif font-semibold mb-4 border-b pb-2">Méthode de paiement</h3>
                        <div class="space-y-3">
                            <label class="flex items-center space-x-3 cursor-pointer">
                                <input type="radio" name="payment_method" value="credit_card" checked class="h-4 w-4 text-d4af37 focus:ring-d4af37">
                                <span>Carte de crédit</span>
                            </label>
                            <label class="flex items-center space-x-3 cursor-pointer">
                                <input type="radio" name="payment_method" value="paypal" class="h-4 w-4 text-d4af37 focus:ring-d4af37">
                                <span>PayPal</span>
                            </label>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn-gold w-full py-4 px-6 text-white rounded-md font-medium text-lg">
                        <i class="fas fa-lock mr-2"></i> Payer maintenant
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-12">
        <div class="max-w-7xl mx-auto px-8 text-center">
            <p>&copy; {{ date('Y') }} Luxe Jewelry. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>