<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil - Luxe Jewelry</title>
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
        
        .profile-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 20px;
        }
        
        .profile-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        
        .profile-actions i {
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .profile-actions i:hover {
            transform: scale(1.2);
            color: #d4af37;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="bg-white text-gray-800 py-4 px-8 shadow-sm">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold gold-text font-serif">LUXE</h1>
            <div class="flex items-center space-x-4">
                <a href="{{ route('product.index') }}" class="text-gray-700 hover:text-d4af37">
                    <i class="fas fa-home mr-1"></i> Accueil
                </a>
            </div>
        </div>
    </nav>

    <!-- Profile Dashboard -->
    <div class="profile-container">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Profile Sidebar -->
            <div class="profile-card p-6">
                <div class="text-center">
                    <div class="w-32 h-32 mx-auto rounded-full bg-gray-100 flex items-center justify-center mb-4 overflow-hidden">
                        @if($user->profile_photo)
                            <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Photo de profil" class="w-full h-full object-cover">
                        @else
                            <i class="fas fa-user text-4xl text-gray-400"></i>
                        @endif
                    </div>
                    <h2 class="text-2xl font-serif font-bold">{{ $user->name }}</h2>
                    <p class="text-gray-500">{{ $user->email }}</p>
                    
                    <!-- Action Icons -->
                    <div class="profile-actions flex justify-center space-x-4 mt-6 text-gray-600">
                        <a href="{{ route('profile.edit') }}" title="Modifier">
                            <i class="fas fa-edit text-xl"></i>
                        </a>
                        <a href="{{ route('profile.update') }}" title="Mettre à jour">
                            <i class="fas fa-sync-alt text-xl"></i>
                        </a>
                        <form method="POST" action="{{ route('profile.destroy') }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Supprimer votre compte définitivement?')" title="Supprimer">
                                <i class="fas fa-trash-alt text-xl"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="md:col-span-2">
                <div class="profile-card p-8">
                    <h3 class="text-xl font-serif font-bold mb-6 border-b pb-2">Mes Informations</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="detail-item">
                            <span class="text-gray-500 font-medium">Nom complet</span>
                            <p class="mt-1">{{ $user->name }}</p>
                        </div>
                        
                        <div class="detail-item">
                            <span class="text-gray-500 font-medium">Email</span>
                            <p class="mt-1">{{ $user->email }}</p>
                        </div>
                        
                        <div class="detail-item">
                            <span class="text-gray-500 font-medium">Téléphone</span>
                            <p class="mt-1">{{ $user->phone ?? 'Non renseigné' }}</p>
                        </div>
                        
                        <div class="detail-item">
                            <span class="text-gray-500 font-medium">Adresse</span>
                            <p class="mt-1">{{ $user->address ?? 'Non renseignée' }}</p>
                        </div>
                    </div>
                    
                    <!-- Additional Sections -->
                    <h3 class="text-xl font-serif font-bold mt-12 mb-6 border-b pb-2">Historique des Commandes</h3>
                    @if($orders->count() > 0)
                        <div class="space-y-4">
                            @foreach($orders as $order)
                                <div class="border rounded-lg p-4 hover:bg-gray-50">
                                    <div class="flex justify-between">
                                        <span class="font-medium">Commande #{{ $order->id }}</span>
                                        <span class="gold-text font-bold">{{ number_format($order->total, 2) }} MAD</span>
                                    </div>
                                    <p class="text-sm text-gray-500 mt-1">{{ $order->created_at->format('d/m/Y') }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">Aucune commande passée.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-12 mt-12">
        <div class="max-w-7xl mx-auto px-8 text-center">
            <p>&copy; {{ date('Y') }} Luxe Jewelry. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>