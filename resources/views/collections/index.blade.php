<?php
    $pageTitle       = "Nos Collections";
    $pageDescription = "Découvrez nos différentes collections de bijoux";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JEWELRY - Bijoux de Luxe</title>
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

        .collection-card {
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
        }

        .collection-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .collection-image {
            position: relative;
            overflow: hidden;
            height: 200px;
            background-color: #f5f5f5;
        }

        .collection-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .collection-card:hover .collection-image img {
            transform: scale(1.05);
        }

        .nav-link {
            position: relative;
            padding: 8px 12px; /* Meilleur espacement tactile */
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

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .hover-gold:hover {
            color: var(--gold);
        }
    </style>
</head>
<body>
    <!-- Barre de navigation fixe optimisée -->
    <nav class="bg-white text-gray-800 py-3 px-6 shadow-sm fixed top-0 left-0 w-full z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="/" class="jewelry-logo text-xl md:text-2xl">
                <span class="gold-text">J</span>EWELRY
            </a>
            
            <ul class="hidden md:flex items-center space-x-6">
                <li>
                    <a href="{{ route('admin.index') }}" 
                       class="nav-link hover-gold transition-colors duration-300 text-sm font-medium">
                       Accueil
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Section Collections -->
    <section class="py-12 bg-white">
        <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-serif font-bold mb-4 gold-text">Nos Collections</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">Découvrez nos gammes de bijoux soigneusement sélectionnés</p>
            </div>

            @if(session()->has('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($collections as $item)
                <div class="collection-card group relative overflow-hidden rounded-lg shadow-md hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="collection-image relative overflow-hidden h-40 bg-gray-100">
                        @if($item->photo)
                            <img src="{{ asset('images/collections/' . $item->photo) }}" 
                                 alt="{{ $item->nom }}"
                                 class="w-full h-full object-cover transition duration-300 group-hover:scale-105">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                <i class="fas fa-layer-group fa-2xl"></i>
                            </div>
                        @endif
                        
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                            <a href="{{ route('collection.show', $item->id) }}" 
                               class="bg-white text-gray-800 px-3 py-1.5 rounded-full font-medium hover:bg-gold-500 hover:text-white transition text-sm">
                               <i class="fas fa-eye mr-1 text-xs"></i>Voir détails
                            </a>
                        </div>
                    </div>
                    
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-1.5">{{ $item->nom }}</h3>
                        <p class="text-gray-600 text-sm mb-3">{{ Str::limit($item->description, 80) }}</p>
                        
                        <div class="flex justify-between items-center space-x-2 pt-3 border-t border-gray-100">
                            <a href="{{ route('collection.edit', ['collection' => $item]) }}" 
                               class="flex-1 text-center bg-gray-100 hover:bg-gray-200 text-gray-800 py-1 px-2 rounded text-xs transition">
                               <i class="fas fa-edit mr-1 text-xs"></i>Éditer
                            </a>
                            
                            <form method="post" 
                                  action="{{ route('collection.delete', ['collection' => $item]) }}" 
                                  class="flex-1"
                                  onsubmit="return confirm('Supprimer cette collection?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="w-full bg-red-50 hover:bg-red-100 text-red-600 py-1 px-2 rounded text-xs transition">
                                    <i class="fas fa-trash-alt mr-1 text-xs"></i>Supprimer
                                </button>
                            </form>
                        </div>
                        
                        <div class="mt-3 md:hidden">
                            <a href="{{ route('collection.show', $item->id) }}" 
                               class="w-full text-center block bg-gray-100 hover:bg-gray-200 text-gray-800 py-1.5 px-3 rounded transition text-xs">
                               <i class="fas fa-eye mr-1 text-xs"></i>Voir détails
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
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
                        <p class="mb-2">75008 Paris, France</p>
                        <p class="mb-2"><i class="fas fa-phone-alt mr-2"></i> +33 1 23 45 67 89</p>
                        <p><i class="fas fa-envelope mr-2"></i> contact@jewelry.com</p>
                    </address>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-sm">
                <p>&copy; 2023 JEWELRY. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>