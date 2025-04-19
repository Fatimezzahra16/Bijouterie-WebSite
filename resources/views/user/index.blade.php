<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Luxe Jewelry</title>
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
        
        .dashboard-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 20px;
        }
        
        .dashboard-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .nav-link {
            transition: all 0.3s;
        }
        
        .nav-link:hover {
            color: #d4af37;
            transform: translateX(5px);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="bg-white text-gray-800 py-4 px-8 shadow-sm">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold gold-text font-serif">LUXE</h1>
            <div class="flex items-center space-x-6">
                <a href="{{ route('dashboard') }}" class="nav-link flex items-center">
                    <i class="fas fa-tachometer-alt mr-2"></i> Tableau de Bord
                </a>
                <a href="" class="nav-link flex items-center">
                    <i class="fas fa-shopping-cart mr-2"></i> Panier
                    <span class="ml-1 bg-d4af37 text-white text-xs px-2 py-1 rounded-full">
                      
                    </span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link flex items-center">
                        <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="dashboard-container">
        <h1 class="text-3xl font-serif font-bold mb-8">Bonjour, {{ auth()->user()->name }}</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <!-- Quick Links Cards -->
            <a href="{{ route('collection.index') }}" class="dashboard-card p-6 text-center">
                <div class="text-d4af37 mb-4">
                    <i class="fas fa-gem text-4xl"></i>
                </div>
                <h3 class="text-xl font-serif font-bold mb-2">Collections</h3>
                <p class="text-gray-600">Parcourez nos collections exclusives</p>
            </a>
            
            <a href="{{ route('product.index') }}" class="dashboard-card p-6 text-center">
                <div class="text-d4af37 mb-4">
                    <i class="fas fa-ring text-4xl"></i>
                </div>
                <h3 class="text-xl font-serif font-bold mb-2">Produits</h3>
                <p class="text-gray-600">Découvrez nos créations</p>
            </a>
            
            <a href="" class="dashboard-card p-6 text-center">
                <div class="text-d4af37 mb-4">
                    <i class="fas fa-receipt text-4xl"></i>
                </div>
                <h3 class="text-xl font-serif font-bold mb-2">Mes Commandes</h3>
                <p class="text-gray-600">Voir l'historique</p>
            </a>
            
            <a href="" class="dashboard-card p-6 text-center">
                <div class="text-d4af37 mb-4">
                    <i class="fas fa-shopping-bag text-4xl"></i>
                </div>
                <h3 class="text-xl font-serif font-bold mb-2">Mon Panier</h3>
                <p class="text-gray-600"> articles</p>
            </a>
        </div>
        
        <!-- Recent Activity Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Recent Products -->
            <div class="dashboard-card p-6">
                <h3 class="text-xl font-serif font-bold mb-4 border-b pb-2">Nouveaux Produits</h3>
                <div class="space-y-4">
                    
                </div>
                <a href="{{ route('product.index') }}" class="nav-link flex items-center justify-end mt-4">
                    Voir tous <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            
            <!-- Recent Orders -->
            <div class="dashboard-card p-6">
                <h3 class="text-xl font-serif font-bold mb-4 border-b pb-2">Dernières Commandes</h3>
               
            </div>
            
            <!-- Profile Summary -->
            <div class="dashboard-card p-6">
                <h3 class="text-xl font-serif font-bold mb-4 border-b pb-2">Mon Profil</h3>
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                        
                    </div>
                    <div>
                        <h4 class="font-medium">{{ auth()->user()->name }}</h4>
                        <p class="text-sm text-gray-600">{{ auth()->user()->email }}</p>
                    </div>
                </div>
                <div class="space-y-3">
                    <a href="{{ route('profile.edit') }}" class="nav-link flex items-center">
                        <i class="fas fa-user-edit mr-3"></i> Modifier le profil
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-12 mt-12">
        <div class="max-w-7xl mx-auto px-8 text-center">
            <p>&copy; {{ date('Y') }} Luxe Jewelry. Tous droits réservés.

            </p>
            
        </div>
        
    </footer>
    
</body>
</html>