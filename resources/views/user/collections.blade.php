
<?php
    $pageTitle       = "Nos Collections";
    $pageDescription = "Découvrez nos différentes collections de bijoux";
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
        
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f9f7f5;
            color: #333;
            padding-top: 80px;
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
            height: 200px;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #d4af37;
            font-size: 3rem;
        }
        
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .collection-image {
    position: relative;
    overflow: hidden;
    height: 200px; /* Ajustez cette valeur selon vos besoins */
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

/* Style pour le placeholder quand pas d'image */
.no-photo-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    color: #d4af37;
    font-size: 3rem;
    background: linear-gradient(135deg, #f9f9f9 0%, #e0e0e0 100%);
}

    </style>
</head>
<body>
    <nav class="bg-white text-gray-800 py-4 px-8 shadow-sm fixed w-full z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold gold-text font-serif">LUXE</h1>
            
            <ul class="hidden md:flex space-x-8">
                <li><a href="{{route('dashboard.products')}}" class="nav-link hover-gold">tableau de bord</a></li>
         
            <a href="" class="nav-link flex items-center">
                <i class="fas fa-shopping-cart mr-2"></i> Panier
                <span class="ml-1 bg-d4af37 text-white text-xs px-2 py-1 rounded-full">
                  
                </span>
            </a>
            <li><form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link flex items-center">
                    <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                </button>
            </form></li>
        </ul>   
            </div>
        </div>
    </nav>



<<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-serif font-bold mb-4 gold-text">Nos Collections</h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">Découvrez nos gammes de bijoux soigneusement sélectionnés</p>
        </div>
        <!-- Collections Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"> <!-- Reduced gap -->
            @foreach ($collections as $item)
            <div class="collection-card group relative overflow-hidden rounded-lg shadow-md hover:shadow-lg transition-all duration-300 border border-gray-100">
                <!-- Image with hover overlay -->
                <div class="collection-image relative overflow-hidden h-40 bg-gray-100"> <!-- Slightly smaller image area -->
                    @if($item->photo)
                        <img src="{{ asset('images/collections/' . $item->photo) }}" 
                             alt="{{ $item->nom }}"
                             class="w-full h-full object-cover transition duration-300 group-hover:scale-105">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                            <i class="fas fa-layer-group fa-2xl"></i> <!-- Slightly smaller icon -->
                        </div>
                    @endif
                    
                    <!-- More compact hover overlay button -->
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                        <a href="{{ route('dashboard.collections_details', $item->id) }}" 
                           class="bg-white text-gray-800 px-3 py-1.5 rounded-full font-medium hover:bg-gold-500 hover:text-white transition text-sm">
                           <i class="fas fa-eye mr-1 text-xs"></i>Voir détails
                        </a>
                    </div>
                </div>
                
                <!-- Card content with more compact buttons -->
                <div class="p-4"> <!-- Reduced padding -->
                    <h3 class="text-lg font-semibold mb-1.5">{{ $item->nom }}</h3> <!-- Slightly smaller text -->
                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($item->description, 80) }}</p> <!-- Smaller text -->
                    
                    <div class="flex justify-between items-center space-x-2 pt-3 border-t border-gray-100">
                        <a href="" 
                           class="flex-1 text-center bg-gray-100 hover:bg-gray-200 text-gray-800 py-1 px-2 rounded text-xs transition">
                        </a>
                    </div>
                    
                    <!-- More compact mobile details link -->
                    <div class="mt-3 md:hidden">
                        <a href="{{ route('dashboard.collections_details', $item->id) }}" 
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
                        <li><a href="../site_eco/contact.php" class="hover-gold">Contact</a></li>
                        <li><a href="../site_eco/livraison.php" class="hover-gold">Livraison</a></li>
                        <li><a href="../site_eco/retours.php" class="hover-gold">Retours</a></li>
                        <li><a href="../site_eco/faq.php" class="hover-gold">FAQ</a></li>
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
