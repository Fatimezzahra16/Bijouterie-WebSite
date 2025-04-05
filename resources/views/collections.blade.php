<?php
$pageTitle = "Nos Collections";
$pageDescription = "Découvrez nos différentes collections de bijoux";

include 'templates/header.php';
include 'templates/navbar.php';
?>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-serif font-bold mb-4">Nos Collections</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Découvrez nos gammes de bijoux soigneusement sélectionnés</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Collection Or -->
            <div class="relative h-96 overflow-hidden rounded-lg group">
                <img src="chemin-image-or.jpg" class="w-full h-full object-cover transition duration-500 group-hover:scale-105" alt="Collection Or">
                <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                    <div class="text-center p-6">
                        <h3 class="text-2xl font-serif font-bold text-white mb-2">Collection Or</h3>
                        <a href="collections/or.php" class="px-6 py-2 bg-white text-gray-800 rounded-full hover:bg-gray-100 transition inline-block">Voir</a>
                    </div>
                </div>
            </div>
            
            <!-- Collection Argent -->
            <div class="relative h-96 overflow-hidden rounded-lg group">
                <img src="chemin-image-argent.jpg" class="w-full h-full object-cover transition duration-500 group-hover:scale-105" alt="Collection Argent">
                <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                    <div class="text-center p-6">
                        <h3 class="text-2xl font-serif font-bold text-white mb-2">Collection Argent</h3>
                        <a href="collections/argent.php" class="px-6 py-2 bg-white text-gray-800 rounded-full hover:bg-gray-100 transition inline-block">Voir</a>
                    </div>
                </div>
            </div>
            
            <!-- Collection Diamants -->
            <div class="relative h-96 overflow-hidden rounded-lg group">
                <img src="chemin-image-diamants.jpg" class="w-full h-full object-cover transition duration-500 group-hover:scale-105" alt="Collection Diamants">
                <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                    <div class="text-center p-6">
                        <h3 class="text-2xl font-serif font-bold text-white mb-2">Collection Diamants</h3>
                        <a href="collections/diamants.php" class="px-6 py-2 bg-white text-gray-800 rounded-full hover:bg-gray-100 transition inline-block">Voir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
include 'templates/newsletter.php';
include 'templates/footer.php';
?>