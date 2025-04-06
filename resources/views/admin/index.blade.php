<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxe Jewelry - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap');
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
        }
        
        .gold-text {
            color: #d4af37;
        }
        
        .gold-bg {
            background-color: #d4af37;
        }
        
        .sidebar {
            background: #1a1a1a;
            width: 200px; /* Reduced from 250px */
            transition: all 0.3s;
        }
        
        .sidebar-link {
            transition: all 0.2s;
            padding: 0.5rem 1rem;
        }
        
        .sidebar-link:hover {
            background: rgba(212, 175, 55, 0.1);
        }
        
        .active-link {
            background: rgba(212, 175, 55, 0.2);
            border-left: 3px solid #d4af37;
        }
        
        .logout-btn {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
            transition: all 0.3s;
        }
        
        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.2);
            border-color: rgba(239, 68, 68, 0.5);
        }
    </style>
</head>
<body class="flex h-screen overflow-hidden">
    <!-- Slim Sidebar -->
    <div class="sidebar text-gray-300 flex flex-col">
        <div class="p-4 flex items-center justify-center border-b border-gray-800">
            <h1 class="text-xl font-serif font-bold gold-text">LUXE</h1> <!-- Smaller text -->
        </div>
        
        <div class="p-3 border-b border-gray-800 flex items-center space-x-2"> <!-- Reduced padding -->
            <img src="https://via.placeholder.com/36" alt="Admin" class="rounded-full w-9 h-9"> <!-- Smaller avatar -->
            <div>
                <p class="text-sm font-medium">Admin</p> <!-- Smaller text -->
                <p class="text-xs text-gray-500">Super Admin</p>
            </div>
        </div>
        
        <nav class="mt-4 flex-1"> <!-- Reduced margin-top -->
            <div class="px-3 mb-4"> <!-- Reduced padding -->
                <p class="text-xs uppercase text-gray-500 mb-1 px-2">Principal</p> <!-- Smaller text -->
                <a href="#" class="block text-sm sidebar-link active-link"> <!-- Smaller text -->
                    <i class="fas fa-tachometer-alt mr-2 gold-text"></i> Tableau de bord
                </a>
            </div>
            
            <div class="px-3 mb-4">
                <p class="text-xs uppercase text-gray-500 mb-1 px-2">Collections</p>
                <a href="{{route('collection.index')}}" class="block text-sm sidebar-link">
                    <i class="fas fa-gem mr-2"></i> Voir Collections
                </a>
                <a href="{{route('collection.create')}}" class="block text-sm sidebar-link">
                    <i class="fas fa-plus-circle mr-2"></i> Ajouter
                </a>
                 <a href="{{route('collection.index')}}" class="block text-sm sidebar-link">
                    <i class="fas fa-plus-circle mr-2"></i> Supprimer
                </a>
            </div>
            <div class="px-3 mb-4">
                <p class="text-xs uppercase text-gray-500 mb-1 px-2">Produits</p>
                <a href="{{url('view_category')}}" class="block text-sm sidebar-link">
                    <i class="fas fa-gem mr-2"></i> Voir Produits
                </a>
                <a href="#" class="block text-sm sidebar-link">
                    <i class="fas fa-plus-circle mr-2"></i> Ajouter
                </a>
                 <a href="#" class="block text-sm sidebar-link">
                    <i class="fas fa-plus-circle mr-2"></i> Supprimer
                </a>
            </div>

     
            <!-- Other menu items... -->
        </nav>
        
        <!-- Logout Button - Bottom of sidebar -->
        <div class="p-3 mt-auto border-t border-gray-800">
    <form method="POST" action="{{ route('logout') }}" class="w-full">
        @csrf
        <button type="submit" class="logout-btn w-full flex items-center justify-center text-sm rounded-lg py-2 px-3">
            <i class="fas fa-sign-out-alt mr-2"></i>
            Se déconnecter
        </button>
    </form>
</div>
    </div>
    
     <!-- Main Content -->
    <div class="flex-1 overflow-auto">
        <!-- Top Navigation -->
        <header class="bg-white shadow-sm p-4 flex justify-between items-center">
            <div class="flex items-center">
                <button class="mr-4 text-gray-600">
                    <i class="fas fa-bars"></i>
                </button>
                <h2 class="text-xl font-semibold">Dashboard</h2>
            </div>
            
            <div class="flex items-center space-x-4">
                <button class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-bell"></i>
                </button>
                <button class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-envelope"></i>
                </button>
                <button class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-cog"></i>
                </button>
            </div>
        </header>
        
        <!-- Dashboard Content -->
        <main class="p-6">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow card p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500">Total Sales</p>
                            <h3 class="text-2xl font-bold">24,780 MAD</h3>
                            <p class="text-sm text-green-500 mt-1">+12% from last month</p>
                        </div>
                        <div class="p-3 rounded-full bg-blue-50 text-blue-600">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow card p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500">New Orders</p>
                            <h3 class="text-2xl font-bold">156</h3>
                            <p class="text-sm text-green-500 mt-1">+8% from last month</p>
                        </div>
                        <div class="p-3 rounded-full bg-purple-50 text-purple-600">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow card p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500">Products</p>
                            <h3 class="text-2xl font-bold">287</h3>
                            <p class="text-sm text-green-500 mt-1">+5 new this week</p>
                        </div>
                        <div class="p-3 rounded-full bg-yellow-50 text-yellow-600">
                            <i class="fas fa-gem"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow card p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500">Customers</p>
                            <h3 class="text-2xl font-bold">1,243</h3>
                            <p class="text-sm text-green-500 mt-1">+32 new today</p>
                        </div>
                        <div class="p-3 rounded-full bg-green-50 text-green-600">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Orders -->
            <div class="bg-white rounded-lg shadow overflow-hidden mb-8">
                <div class="p-4 border-b flex justify-between items-center">
                    <h3 class="font-semibold">Produits</h3>
                    <a href="#" class="text-sm gold-text hover:underline">Voir tout</a>
                </div>
    <div class="product-table-container">

</div>
 
<!-- here we shoud create a product table-->


            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-semibold mb-4">Add New Product</h3>
                    <p class="text-gray-600 text-sm mb-4">Quickly add a new product to your collection</p>
                    <a href="{{route('product.create')}}">
                    <button class="w-full gold-bg text-white py-2 rounded-lg hover:bg-yellow-600 transition">
                        <i class="fas fa-plus mr-2"></i> Add Product
                    </button>
                    </a>
                </div>
                
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-semibold mb-4">View Inventory</h3>
                    <p class="text-gray-600 text-sm mb-4">Check stock levels and manage inventory</p>
                    <button class="w-full border border-gray-300 text-gray-700 py-2 rounded-lg hover:bg-gray-50 transition">
                        <i class="fas fa-boxes mr-2"></i> View Inventory
                    </button>
                </div>
          
            </div>
        </main>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
