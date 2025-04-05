<?php
// Récupérer l'ID du produit depuis l'URL
$productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Simuler un tableau de produits (identique à celui dans votre fichier original)
$collectionProducts = [
    ['nom' => 'Montre Classique', 'description' => 'Montre à trois aiguilles en argent avec boîtier noir en acier inoxydable durable. Cadran en acier offrant un contraste saisissant et une lisibilité optimale.', 'prix' => 199, 'image' => '/site_eco/images/montre.jpg'],
    // ... autres produits
];

// Vérifier si l'ID est valide
if ($productId >= 0 && $productId < count($collectionProducts)) {
    $product = $collectionProducts[$productId];
} else {
    // Rediriger si l'ID est invalide
    header('Location: bijoux.php');
    exit;
}

$pageTitle = $product['nom'];
include 'templates/header.php';
include 'templates/navbar.php';
?>

<main class="pt-32 pb-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <!-- Fil d'Ariane -->
        <div class="mb-8 text-sm text-gray-600">
            <a href="/site_eco/index.php" class="hover-gold">Accueil</a> > 
            <a href="/site_eco/montres.php" class="hover-gold">Montres</a> > 
            <span><?= htmlspecialchars($product['nom']) ?></span>
        </div>
        
        <!-- Section détaillée du produit -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Images du produit -->
            <div class="bg-white p-8 rounded-lg shadow-sm">
                <div class="mb-4 h-96 overflow-hidden rounded-lg flex items-center justify-center">
                    <img src="<?= $product['image'] ?>" alt="<?= $product['nom'] ?>" class="max-h-full max-w-full object-contain">
                </div>
                <div class="grid grid-cols-4 gap-2">
                    <!-- Miniatures supplémentaires -->
                    <div class="border rounded p-1 cursor-pointer hover:border-yellow-500">
                        <img src="<?= $product['image'] ?>" class="w-full h-16 object-cover">
                    </div>
                    <!-- Ajoutez d'autres miniatures si disponible -->
                </div>
            </div>
            
            <!-- Détails du produit -->
            <div>
                <h1 class="text-3xl font-serif font-bold mb-2"><?= htmlspecialchars($product['nom']) ?></h1>
                <div class="text-2xl gold-text font-bold mb-6"><?= number_format($product['prix'], 2) ?> MAD</div>
                
                <div class="mb-6">
                    <p class="text-gray-700"><?= $product['description'] ?></p>
                </div>
                
                <!-- Options de personnalisation -->
                <div class="mb-6">
                    <h3 class="font-semibold mb-3 text-lg">Couleur</h3>
                    <div class="flex space-x-2">
                        <button class="w-10 h-10 rounded-full bg-black border-2 border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200"></button>
                        <button class="w-10 h-10 rounded-full bg-gray-400 border-2 border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200"></button>
                        <button class="w-10 h-10 rounded-full bg-yellow-400 border-2 border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200"></button>
                    </div>
                </div>
                
                <div class="mb-6">
                    <h3 class="font-semibold mb-3 text-lg">Taille</h3>
                    <select class="border rounded p-2 w-full max-w-xs focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200">
                        <option>Sélectionnez une taille</option>
                        <option>Petit (16cm)</option>
                        <option>Moyen (18cm)</option>
                        <option>Grand (20cm)</option>
                    </select>
                </div>
                
                <div class="mb-8">
                    <h3 class="font-semibold mb-3 text-lg">Quantité</h3>
                    <div class="flex items-center w-32">
                        <button class="border rounded-l px-3 py-1 text-lg hover:bg-gray-100">-</button>
                        <input type="number" value="1" min="1" class="border-t border-b w-12 text-center py-1 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200">
                        <button class="border rounded-r px-3 py-1 text-lg hover:bg-gray-100">+</button>
                    </div>
                </div>
                
                <button onclick="ajouterAuPanier('<?= $product['nom'] ?>', <?= $product['prix'] ?>)" 
                        class="w-full max-w-md gold-bg text-white py-3 rounded-lg hover:bg-yellow-600 transition font-medium mb-6">
                    AJOUTER AU PANIER
                </button>
                
                <!-- Informations supplémentaires -->
                <div class="space-y-3 text-sm text-gray-600 mb-8">
                    <div class="flex items-start">
                        <span class="mr-2">✅</span>
                        <p>Toutes les transactions et les paiements en ligne réalisés sont 100% sécurisés</p>
                    </div>
                    <div class="flex items-start">
                        <span class="mr-2">🚚</span>
                        <p>La livraison aux points relais est totalement GRATUITE.</p>
                    </div>
                </div>
                
                <!-- Détails supplémentaires -->
                <div class="pt-6 border-t">
                    <h3 class="font-semibold text-lg mb-4">DÉTAILS DU PRODUIT</h3>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <p class="text-gray-500">Référence</p>
                            <p class="font-medium">A00<?= rand(100, 999) ?></p>
                        </div>
                        <div>
                            <p class="text-gray-500">Matière</p>
                            <p class="font-medium">Acier inoxydable</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Type de montre</p>
                            <p class="font-medium">Analogique</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Étanchéité</p>
                            <p class="font-medium">50m</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
include 'templates/newsletter.php';
include 'templates/footer.php';
?>