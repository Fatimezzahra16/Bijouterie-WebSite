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
    </style>
</head>
<body>
    <!-- Navigation (same as your other pages) -->
    <nav class="bg-white text-gray-800 py-4 px-8 shadow-sm">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold gold-text font-serif">LUXE</h1>
            <a href="{{ route('product.index') }}" class="back-link flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Retour aux produits
            </a>
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
    </footer>
</body>
</html>