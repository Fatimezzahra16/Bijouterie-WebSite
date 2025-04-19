<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - JEWELRY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap');
        
        :root {
            --gold: #d4af37;
            --dark: #2c3e50;
            --light-bg: #f9f7f5;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--light-bg);
            color: var(--dark);
            padding-top: 76px; /* Ajustement pour la navbar fixe */
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
            height: 40px;
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
            margin-right: 2px;
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
            position: relative;
            transition: all 0.3s;
        }

        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: var(--gold);
            transition: width 0.3s;
        }

        .nav-link:hover:after {
            width: 100%;
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
            <div class="flex items-center space-x-6">
                <a href="{{ route('dashboard') }}" class="nav-link flex items-center px-3 py-2">
                    <i class="fas fa-tachometer-alt mr-2"></i> Tableau de Bord
                </a>
                <a href="{{route('cart.index')}}" class="nav-link flex items-center px-3 py-2">
                    <i class="fas fa-shopping-cart mr-2"></i> Panier
                    <span class="ml-1 bg-d4af37 text-white text-xs px-2 py-1 rounded-full"></span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link flex items-center px-3 py-2">
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
            <a href="{{ route('dashboard.collections') }}" class="dashboard-card p-6 text-center">
                <div class="text-d4af37 mb-4">
                    <i class="fas fa-gem text-4xl"></i>
                </div>
                <h3 class="text-xl font-serif font-bold mb-2">Collections</h3>
                <p class="text-gray-600">Parcourez nos collections exclusives</p>
            </a>
            
            <a href="{{ route('dashboard.products') }}" class="dashboard-card p-6 text-center">
                <div class="text-d4af37 mb-4">
                    <i class="fas fa-ring text-4xl"></i>
                </div>
                <h3 class="text-xl font-serif font-bold mb-2">Produits</h3>
                <p class="text-gray-600">Découvrez nos créations</p>
            </a>
            
            <a href="{{route('commandes.historique')}}" class="dashboard-card p-6 text-center">
                <div class="text-d4af37 mb-4">
                    <i class="fas fa-receipt text-4xl"></i>
                </div>
                <h3 class="text-xl font-serif font-bold mb-2">Mes Commandes</h3>
                <p class="text-gray-600">Voir l'historique</p>
            </a>
            
            <a href="{{route('cart.index')}}" class="dashboard-card p-6 text-center">
                <div class="text-d4af37 mb-4">
                    <i class="fas fa-shopping-bag text-4xl"></i>
                </div>
                <h3 class="text-xl font-serif font-bold mb-2">Mon Panier</h3>
                <p class="text-gray-600"> articles</p>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Profile Summary -->
            <div class="dashboard-card p-6">
                <h3 class="text-xl font-serif font-bold mb-4 border-b pb-2">Mon Profil</h3>
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                        <!-- Ajouter une icône utilisateur si nécessaire -->
                         <img src="images/img1.jpeg">
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
            <p>&copy; {{ date('Y') }} <span class="gold-text">J</span>EWELRY. Tous droits réservés.</p>
            <pre>

        
        </pre>
        </div>
    </footer>
</body>
</html>