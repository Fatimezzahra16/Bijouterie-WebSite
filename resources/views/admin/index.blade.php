<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JEWELRY - Admin Dashboard</title>
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
            background-color: #f8f9fa;
        }

        /* Logo styling */
        .jewelry-logo {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            letter-spacing: 1px;
            position: relative;
            display: inline-block;
            color: var(--dark);
            text-transform: uppercase;
        }

        .jewelry-logo .gold-text {
            color: var(--gold);
        }

        .jewelry-logo::after {
            content: "";
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, var(--gold), transparent);
        }

        /* Sidebar adjustments */
        .sidebar {
            background: #1a1a1a;
            width: 200px;
            transition: all 0.3s;
        }

        .sidebar .jewelry-logo {
            color: white;
            padding: 20px 15px;
        }

        .sidebar .jewelry-logo::after {
            background: var(--gold);
        }

        .gold-bg {
            background-color: var(--gold);
        }

        .sidebar-link {
            transition: all 0.2s;
            padding: 0.5rem 1rem;
            color: #e5e7eb;
        }

        .sidebar-link:hover {
            background: rgba(212, 175, 55, 0.1);
            color: var(--gold);
        }

        .active-link {
            background: rgba(212, 175, 55, 0.2);
            border-left: 3px solid var(--gold);
        }
    </style>
</head>
<body class="flex h-screen overflow-hidden">
    <!-- Slim Sidebar -->
    <div class="sidebar text-gray-300 flex flex-col">
        <!-- Logo -->
        <a href="/" class="jewelry-logo text-xl">
            <span class="gold-text">J</span>EWELRY
        </a>

        <nav class="mt-2 flex-1">
            <div class="px-3 mb-4">
                <p class="text-xs uppercase text-gray-500 mb-1 px-2">Principal</p>
                <a href="#" class="block text-sm sidebar-link active-link">
                    <i class="fas fa-tachometer-alt mr-2 gold-text"></i> Tableau de bord
                </a>
            </div>

            <!-- ... (le reste du sidebar reste inchangé) ... -->

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
                <a href="{{route('product.index')}}" class="block text-sm sidebar-link">
                    <i class="fas fa-gem mr-2"></i> Voir Produits
                </a>
                <a href="{{route('product.create')}}" class="block text-sm sidebar-link">
                    <i class="fas fa-plus-circle mr-2"></i> Ajouter
                </a>
                 <a href="{{route('product.index')}}" class="block text-sm sidebar-link">
                    <i class="fas fa-plus-circle mr-2"></i> Supprimer
                </a>
            </div>



        </nav>

        <!-- Logout Button -->
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
    <!-- Other menu items... -->
    </nav>

    <!-- Main Content -->
    <div class="flex-1 overflow-auto">
        <!-- Top Navigation -->
        <header class="bg-white shadow-sm p-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold">Tableau de bord</h2>
            <div class="flex items-center space-x-4">
                <!-- Icônes de notification -->
            </div>
        </header>

        
        <!-- ... (le reste du contenu reste inchangé) ... --><!-- Dashboard Content -->
        <main class="p-6">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Sales Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-gray-500">Total Sales</p>
                <h3 class="text-2xl font-bold">{{ number_format($currentMonthSales, 0) }} MAD</h3>
                <p class="text-sm {{ $salesPercentageChange >= 0 ? 'text-green-500' : 'text-red-500' }} mt-1">
                    {{ $salesPercentageChange >= 0 ? '+' : '' }}{{ number_format($salesPercentageChange, 1) }}% vs last month
                </p>
            </div>
            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                <i class="fas fa-coins"></i>
            </div>
        </div>
    </div>

    <!-- New Orders Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-gray-500">New Orders</p>
                <h3 class="text-2xl font-bold">{{ $currentMonthOrders }}</h3>
                <p class="text-sm {{ $ordersPercentageChange >= 0 ? 'text-green-500' : 'text-red-500' }} mt-1">
                    {{ $ordersPercentageChange >= 0 ? '+' : '' }}{{ number_format($ordersPercentageChange, 1) }}% vs last month
                </p>
            </div>
            <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                <i class="fas fa-shopping-cart"></i>
            </div>
        </div>
    </div>

    <!-- Products Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-gray-500">Products</p>
                <h3 class="text-2xl font-bold">{{ $totalProducts }}</h3>
                <p class="text-sm text-green-500 mt-1">
                    +{{ $newThisWeek }} new this week
                </p>
            </div>
            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                <i class="fas fa-gem"></i>
            </div>
        </div>
    </div>

    <!-- Customers Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-gray-500">Customers</p>
                <h3 class="text-2xl font-bold">{{ $totalCustomers }}</h3>
                <p class="text-sm text-green-500 mt-1">
                    +{{ $newToday }} new today
                </p>
            </div>
            <div class="p-3 rounded-full bg-green-100 text-green-600">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>
</div>

<!-- Recent Orders Table -->
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-xl font-semibold mb-4">Recent Orders</h2>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="text-left text-gray-600 border-b">
                    <th class="pb-3">Order ID</th>
                    <th class="pb-3">Customer</th>
                    <th class="pb-3">Date</th>
                    <th class="pb-3">Total</th>
                    <th class="pb-3">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($latestOrders as $order)
                <tr class="border-b last:border-b-0">
                    <td class="py-3">#{{ $order->id }}</td>
                    <td class="py-3">{{ $order->user->name }}</td>
                    <td class="py-3">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td class="py-3">{{ number_format($order->total, 2) }} MAD</td>
                    <td class="py-3">
                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                            Completed
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
                    <h3 class="font-semibold mb-4">Ajouter Nouveau Produit</h3>
                    <p class="text-gray-600 text-sm mb-4">Ajoutez rapidement un nouveau produit à votre collection</p>
                    <a href="{{route('product.create')}}">
                    <button class="w-full gold-bg text-white py-2 rounded-lg hover:bg-yellow-600 transition">
                        <i class="fas fa-plus mr-2"></i> Ajouter Produit
                    </button>
                    </a>
                </div>
                
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-semibold mb-4">Voir l'inventaire</h3>
                    <p class="text-gray-600 text-sm mb-4">Vérifier les niveaux de stock et gérer l'inventaire</p>
                    <a href="{{ route('product.index') }}">
                    <button class="w-full border border-gray-300 text-gray-700 py-2 rounded-lg hover:bg-gray-50 transition">
                        <i class="fas fa-boxes mr-2"></i> View Inventory
                    </button>
                    </a>
                </div>
          
            </div>
        </main>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
