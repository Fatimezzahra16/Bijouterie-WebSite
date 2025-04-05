<?php
include 'templates/header.php';
include 'templates/navbar.php';
?>
<!DOCTYPE html>
<html lang="fr">
   
<body class="bg-gray-50">
    <!-- Hero Section -->
    <section class="header-background mt-16">
        <img src="../site_eco/images/IMG-20250323-WA0006.jpg" class="active" alt="Diaporama 1">
        <img src="../site_eco/images/IMG-20250328-WA0012.jpg" alt="Diaporama 2">
        <img src="../site_eco/images/IMG-20250328-WA0016.jpg" alt="Diaporama 3">
        <div class="hero-overlay"></div>
        <div class="hero-content h-full flex flex-col justify-center items-center text-center px-4">
            <h2 class="text-5xl md:text-6xl font-serif font-bold text-white mb-4">Bijoux Exceptionnels</h2>
            <p class="text-xl text-white mb-8 max-w-2xl">Découvrez notre collection exclusive de bijoux artisanaux</p>
        </div>
        
    </section>
    
    <div class="max-w-6xl mx-auto px-4 py-12">
        <!-- En-tête -->
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl contact-title mb-4">Contactez-nous</h1>
            <div class="w-20 h-1 bg-black mx-auto mb-6"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Colonne de gauche - Adresse -->
            <div>
                <div class="address-block mb-8 text-sm">
                    MOHAMED V CENTRE
                    B 6ème étage 709
                    ANGLE RUE AIT BA
                    AMRANE ET RUE
                    ALBERT 1er ROCHE
                    NOIR CASABLANCA
                    MAROC
                    30000 Casablanca
                    Maroc
                </div>
                
                <div class="mb-8">
                    <h3 class="font-medium mb-2">Envoyez-nous un e-mail :</h3>
                    <a href="mailto:contact@exist-fashion.ma" class="text-blue-600 hover:underline">contact@exist-fashion.ma</a>
                </div>
                
                <div>
                    <h3 class="font-medium mb-2">Services clients :</h3>
                    <a href="mailto:votre@email.com" class="text-blue-600 hover:underline">votre@email.com</a>
                </div>
            </div>
            
            <!-- Colonne de droite - Formulaire -->
            <div>
                <h2 class="text-2xl contact-title mb-6">Contactez-Nous</h2>
                
                <form class="space-y-6">
                    <!-- Sujet -->
                    <div>
                        <label for="subject" class="block text-sm font-medium mb-1">Sujet</label>
                        <input type="text" id="subject" name="subject" 
                               class="w-full px-4 py-2 form-input rounded">
                    </div>
                    
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium mb-1">Adresse e-mail</label>
                        <input type="email" id="email" name="email" 
                               class="w-full px-4 py-2 form-input rounded">
                    </div>
                    
                    <!-- Fichier joint -->
                    <div>
                        <label for="file" class="block text-sm font-medium mb-1">Document joint</label>
                        <label for="file" class="file-input-label w-full flex flex-col items-center justify-center px-4 py-8 rounded cursor-pointer border-dashed">
                            <i class="fas fa-cloud-upload-alt text-3xl mb-2 text-gray-400"></i>
                            <span class="text-sm text-gray-500">CHOISIR UN FICHIER</span>
                            <input type="file" id="file" name="file" class="hidden">
                        </label>
                        <p class="text-xs text-gray-500 mt-1">optionnel</p>
                    </div>
                    
                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-sm font-medium mb-1">Message</label>
                        <textarea id="message" name="message" rows="5"
                                  class="w-full px-4 py-2 form-input rounded" placeholder="Comment pouvons-nous aider ?"></textarea>
                    </div>
                    
                    <!-- Bouton Envoyer -->
                    <div>
                        <button type="submit" class="btn-send px-8 py-3 rounded uppercase text-sm font-medium tracking-wider">
                            ENVOYER
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  
    <?php 
include 'templates/newsletter.php';
include 'templates/footer.php';
?>
</body>
</html>