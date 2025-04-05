<?php
$pageTitle = "FAQ - Questions Fréquentes";
$pageDescription = "Trouvez des réponses à vos questions sur nos bijoux et services";
include 'templates/header.php';
include 'templates/navbar.php';
?>

<main class="py-16 bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-3xl font-serif font-bold mb-8 text-center">Foire Aux Questions</h1>
        
        <div class="bg-white p-8 rounded-lg shadow-sm">
            <div class="space-y-6">
                <!-- Question 1 -->
                <div class="border-b border-gray-200 pb-4">
                    <button class="faq-question flex justify-between items-center w-full text-left font-medium hover-gold">
                        <span>Comment savoir ma taille de bague ?</span>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </button>
                    <div class="faq-answer mt-2 hidden">
                        <p>Nous proposons un guide des tailles disponible en magasin. Vous pouvez également nous envoyer un email avec le contour de votre doigt tracé sur papier et nous vous conseillerons.</p>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="border-b border-gray-200 pb-4">
                    <button class="faq-question flex justify-between items-center w-full text-left font-medium hover-gold">
                        <span>Les bijoux sont-ils livrés avec un certificat d'authenticité ?</span>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </button>
                    <div class="faq-answer mt-2 hidden">
                        <p>Oui, tous nos bijoux en or, platine et avec pierres précieuses sont livrés avec un certificat d'authenticité numéroté.</p>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="border-b border-gray-200 pb-4">
                    <button class="faq-question flex justify-between items-center w-full text-left font-medium hover-gold">
                        <span>Proposez-vous des services de gravure ?</span>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </button>
                    <div class="faq-answer mt-2 hidden">
                        <p>Oui, nous proposons un service de gravure personnalisée pour la plupart de nos bijoux. Le délai supplémentaire est de 3 à 5 jours ouvrables.</p>
                    </div>
                </div>

                <!-- Question 4 -->
                <div class="border-b border-gray-200 pb-4">
                    <button class="faq-question flex justify-between items-center w-full text-left font-medium hover-gold">
                        <span>Quels sont les modes de paiement acceptés ?</span>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </button>
                    <div class="faq-answer mt-2 hidden">
                        <p>Nous acceptons les cartes Visa, Mastercard, American Express, PayPal ainsi que les virements bancaires. Le paiement en magasin peut également se faire en espèces.</p>
                    </div>
                </div>

                <!-- Question 5 -->
                <div class="border-b border-gray-200 pb-4">
                    <button class="faq-question flex justify-between items-center w-full text-left font-medium hover-gold">
                        <span>Comment entretenir mes bijoux en or ?</span>
                        <i class="fas fa-chevron-down transition-transform"></i>
                    </button>
                    <div class="faq-answer mt-2 hidden">
                        <p>Nous recommandons de nettoyer vos bijoux avec un chiffon doux et un produit spécifique pour bijoux précieux. Évitez le contact avec les produits chimiques et retirez vos bijoux avant de vous baigner.</p>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-center">
                <p>Vous ne trouvez pas réponse à votre question ?</p>
                <a href="contact.php" class="mt-2 inline-block px-6 py-3 gold-bg text-white rounded-full hover:bg-yellow-600 transition font-medium">
                    Contactez-nous
                </a>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const questions = document.querySelectorAll('.faq-question');
    
    questions.forEach(question => {
        question.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const icon = this.querySelector('i');
            
            // Toggle answer visibility
            answer.classList.toggle('hidden');
            
            // Rotate icon
            icon.classList.toggle('transform');
            icon.classList.toggle('rotate-180');
        });
    });
});
</script>

<?php 
include 'templates/newsletter.php';
include 'templates/footer.php';
?>