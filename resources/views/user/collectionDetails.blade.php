<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $collection->nom }} - Luxe Jewelry</title>
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
        
        .collection-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        .collection-image-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        
        .collection-image-placeholder {
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
        
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 24px;
            margin-top: 40px;
        }
        /* Collection card styling */
.collection-card {
    transition: all 0.3s ease;
    background: white;
}

.collection-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

/* Image container */
.collection-image {
    position: relative;
    overflow: hidden;
}

/* Hover overlay effect */
.collection-image::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.3);
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 1;
}

.collection-card:hover .collection-image::before {
    opacity: 1;
}

/* Details button */
.details-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
    opacity: 0;
    transition: all 0.3s ease;
}

.collection-card:hover .details-btn {
    opacity: 1;
}

/* Action buttons */
.action-btn {
    padding: 0.5rem;
    border-radius: 0.375rem;
    font-size: 0.875rem;
    font-weight: 500;
    transition: all 0.2s;
}
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="bg-white text-gray-800 py-4 px-8 shadow-sm">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold gold-text font-serif">LUXE</h1>
            <a href="{{ route('collection.index') }}" class="back-link flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Retour aux collections
            </a>
        </div>
    </nav>

    <div class="collection-container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Collection Image -->
            <div class="collection-image-container">
                @if($collection->photo)
                    <img src="{{ asset('images/collections/' . $collection->photo) }}" 
                         alt="{{ $collection->nom }}"
                         class="w-full h-auto object-cover">
                @else
                    <div class="w-full h-80 flex items-center justify-center collection-image-placeholder">
                        <i class="fas fa-layer-group text-6xl"></i>
                    </div>
                @endif
            </div>
            
            <!-- Collection Details -->
            <div class="bg-white p-8 rounded-lg shadow-sm">
                <h1 class="text-3xl font-serif font-bold mb-6">{{ $collection->nom }}</h1>
                
                <div class="mb-8">
                    <div class="detail-item">
                        <span class="text-gray-500 font-medium">Description</span>
                        <p class="mt-2 text-gray-700">{{ $collection->description }}</p>
                    </div>
                    
                    <div class="detail-item">
                        <span class="text-gray-500 font-medium">Nombre de produits</span>
                        <p class="mt-1 text-lg font-medium">{{ $collection->products->count() }} produits</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
        
        <!-- Products in this collection -->
        @if($collection->products->count() > 0)
        <div class="mt-16">
            <h2 class="text-2xl font-serif font-bold mb-8 border-b pb-2">Produits dans cette collection</h2>
            
            <div class="products-grid">
                @foreach($collection->products as $product)
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="h-40 bg-gray-100 rounded mb-4 overflow-hidden">
                        @if($product->photo)
                            <img src="{{ asset('images/products/' . $product->photo) }}" 
                                 alt="{{ $product->nom }}"
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                <i class="fas fa-gem text-4xl"></i>
                            </div>
                        @endif
                    </div>
                    <h3 class="font-semibold">{{ $product->nom }}</h3>
                    <p class="text-gold-600 font-bold mt-1">{{ number_format($product->prix, 2) }} MAD</p>
                    <a href="{{ route('dashboard.products_details', $product) }}" 
                       class="inline-block mt-3 text-sm text-gray-600 hover:text-gold-600">
                       Voir produit <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-12 mt-16">
        <!-- Your footer content -->
    </footer>
</body>
</html>