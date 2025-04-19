<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->nom }} - Luxe Jewelry</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap');
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f9f7f5;
            color: #333;
            padding: 0;
            margin: 0;
        }
        
        .gold-text {
            color: #d4af37;
        }
        
        .product-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        .product-image-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        
        .product-image-placeholder {
            background: linear-gradient(135deg, #f9f9f9 0%, #e0e0e0 100%);
            color: #d4af37;
        }
        
        .back-link {
            transition: all 0.3s;
        }
        
        .back-link:hover {
            color: #d4af37;
        }
        
        .detail-item {
            border-bottom: 1px solid #eee;
            padding-bottom: 12px;
            margin-bottom: 12px;
        }
        :root {
      --gold: #d4af37;
      --dark: #2c3e50;
      --light-bg: #f9f7f5;
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background-color: var(--light-bg);
      color: var(--dark);
      line-height: 1.6;
      padding-top: 80px;
    }

        .jewelry-logo {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      font-size: 2.5rem;
      position: relative;
      display: inline-block;
      color: var(--dark);
      text-transform: uppercase;
      letter-spacing: 2px;
      padding-bottom: 10px;
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
    }

    .jewelry-logo::after {
      content: "";
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 3px;
      background: linear-gradient(90deg, var(--gold), transparent);
    }

    .jewelry-logo span::before {
      content: "♦";
      position: absolute;
      color: var(--gold);
      font-size: 0.8rem;
      top: -12px;
      right: -8px;
    }

    .jewelry-logo:hover {
      color: var(--gold);
      transition: color 0.3s ease;
    }

    .jewelry-logo:hover::before {
      transform: scale(1.2);
      transition: transform 0.3s ease;
    }

    .fixed-navbar {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      background-color: white;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 15px 0;
    }
    .hero-section {
      position: relative;
      height: 80vh;
      overflow: hidden;
      background-color: #2a2926;
    }

    .hero-bg-image {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-size: cover;
      background-position: center;
      opacity: 0;
      transition: opacity 1s ease-in-out;
    }

    .hero-bg-image.active {
      opacity: 0.9;
    }

    .hero-content {
      position: relative;
      z-index: 2;
    }

    .btn-gold {
      background-color: var(--gold);
      color: white;
      transition: all 0.3s;
    }

    .btn-gold:hover {
      background-color: #b5952e;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
    }

    .btn-outline {
      border: 1px solid var(--dark);
      transition: all 0.3s;
    }
    </style>
</head>
<body>
    <!-- Navigation (same as your other pages) -->
    <nav class="fixed-navbar">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-8">
      <a href="/" class="jewelry-logo"><span>J</span>ewelry</a>
      <div class="flex items-center space-x-4">
      <a href="{{ route('product.index') }}" class="back-link flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Retour aux produits
            </a>
      </div>
    </div>
  </nav>
    

    <div class="product-container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Product Image -->
            <div class="product-image-container">
                @if($product->photo)
                    <img src="{{ asset('images/products/' . $product->photo) }}" 
                         alt="{{ $product->nom }}"
                         class="w-full h-auto object-cover">
                @else
                    <div class="w-full h-80 flex items-center justify-center product-image-placeholder">
                        <i class="fas fa-gem text-6xl"></i>
                    </div>
                @endif
            </div>
            
            <!-- Product Details -->
            <div class="bg-white p-8 rounded-lg shadow-sm">
                <h1 class="text-3xl font-serif font-bold mb-6">{{ $product->nom }}</h1>
                
                <div class="mb-8">
                    <div class="detail-item">
                        <span class="text-gray-500 font-medium">Description</span>
                        <p class="mt-2 text-gray-700">{{ $product->description }}</p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="detail-item">
                            <span class="text-gray-500 font-medium">Prix</span>
                            <p class="text-2xl font-bold gold-text mt-1">{{ number_format($product->prix, 2) }} MAD</p>
                        </div>
                        
                        <div class="detail-item">
                            <span class="text-gray-500 font-medium">Disponibilité</span>
                            <p class="text-lg font-medium mt-1">
                                @if($product->stock > 0)
                                    <span class="text-green-600">{{ $product->stock }} en stock</span>
                                @else
                                    <span class="text-red-500">Rupture de stock</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    
                    <div class="detail-item">
                        <span class="text-gray-500 font-medium">Collection</span>
                        <p class="mt-1">
                            @if($product->collection)
                                <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">
                                    {{ $product->collection->nom }}
                                </span>
                            @else
                                <span class="text-gray-400">Aucune collection</span>
                            @endif
                        </p>
                    </div>
                </div>
                
                <div class="flex space-x-4 pt-6 border-t border-gray-100">
                    <a href="{{ route('product.edit', $product) }}" 
                       class="flex-1 text-center bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded transition">
                       <i class="fas fa-edit mr-2"></i> Modifier
                    </a>
                    
                    <form method="POST" action="{{ route('product.delete', $product) }}" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="w-full bg-red-50 hover:bg-red-100 text-red-600 font-medium py-2 px-4 rounded transition"
                                onclick="return confirm('Supprimer ce produit?')">
                            <i class="fas fa-trash-alt mr-2"></i> Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer (same as your other pages) -->
    <footer class="bg-gray-900 text-gray-300 py-12">
        <!-- Your footer content -->
        <footer class="bg-gray-900 text-gray-300 py-12">
        <div class="mt-12 text-center">
      <h3 class="text-xl font-medium mb-6">Nos coordonnées</h3>
      <p class="mb-2"><i class="fas fa-map-marker-alt mr-2 text-gold-500"></i> 123 Avenue des Bijoux, 75001 Rabat</p>
      <p class="mb-2"><i class="fas fa-phone mr-2 text-gold-500"></i> +212 6 51 57 68 97</p>
      <p class="mb-6"><i class="fas fa-envelope mr-2 text-gold-500"></i> contact@luxe-jewelry.com</p>

      <div class="flex justify-center space-x-6">
                <a href="https://www.facebook.com/share/1649weVhTD/" class="text-gray-700 hover:text-gold-500"><i class="fab fa-facebook-f text-2xl"></i></a>
                <a href="https://www.instagram.com/f__ati16?igsh=MWV6MHlicm9peTJndg==" class="text-gray-700 hover:text-gold-500"><i class="fab fa-instagram text-2xl"></i></a>
                <a href=" https://twitter.com/login" class="text-gray-700 hover:text-gold-500"><i class="fab fa-twitter text-2xl"></i></a>
                
            </div>
    </div>
    </footer>
</body>
</html>