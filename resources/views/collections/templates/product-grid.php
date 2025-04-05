
    <!-- Produits de la collection -->
    <main class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-serif font-bold mb-4">Nos Pièces en Or</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Des créations uniques en or 18 carats</p>
            </div>
            
            <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($produitsPageActuelle as $produit): ?>
                    <div class="product-card rounded-lg overflow-hidden">
                        <div class="relative overflow-hidden h-64">
                            <img src="<?= $produit['image'] ?>" alt="<?= $produit['nom'] ?>" class="w-full h-full object-cover transition duration-500 hover:scale-110">
                            <div class="absolute top-4 right-4">
                                <button class="bg-white p-2 rounded-full shadow-md hover:bg-gray-100">
                                    <i class="far fa-heart text-gray-600"></i>
                                </button>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2"><?= $produit['nom'] ?></h3>
                            <p class="text-gray-600 mb-4"><?= $produit['description'] ?></p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold gold-text"><?= number_format($produit['prix'], 2) ?> €</span>
                                <button onclick="ajouterAuPanier('<?= $produit['nom'] ?>', <?= $produit['prix'] ?>)" class="px-4 py-2 gold-bg text-white rounded-full hover:bg-yellow-600 transition flex items-center">
                                    <i class="fas fa-shopping-bag mr-2"></i> Ajouter
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                <nav class="flex space-x-2">
                    <?php if ($pageActuelle > 1): ?>
                        <a href="?page=<?= $pageActuelle - 1 ?>" class="px-4 py-2 border border-gray-300 rounded-full hover:bg-gray-100 transition">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="?page=<?= $i ?>" class="px-4 py-2 border <?= $i == $pageActuelle ? 'gold-border bg-gold-50 text-yellow-600' : 'border-gray-300' ?> rounded-full hover:bg-gray-100 transition">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>

                    <?php if ($pageActuelle < $totalPages): ?>
                        <a href="?page=<?= $pageActuelle + 1 ?>" class="px-4 py-2 border border-gray-300 rounded-full hover:bg-gray-100 transition">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    <?php endif; ?>
                </nav>
            </div>
        </div>
    </main>
