<?php
$pageTitle = "Politique de Retours";
$pageDescription = "Découvrez notre politique de retours et échanges pour vos achats";
include 'templates/header.php';
include 'templates/navbar.php';
?>

<main class="py-16 bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-3xl font-serif font-bold mb-8 text-center">Politique de Retours</h1>
        
        <div class="bg-white p-8 rounded-lg shadow-sm">
            <section class="mb-8">
                <h2 class="text-2xl font-serif font-bold mb-4 gold-text">Conditions de Retour</h2>
                <p class="mb-4">Nous acceptons les retours sous 30 jours suivant la réception de votre commande.</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Les articles doivent être dans leur état d'origine, non portés et avec leurs étiquettes</li>
                    <li>Les bijoux sur mesure ou personnalisés ne peuvent être retournés</li>
                    <li>Le certificat d'authenticité doit être inclus</li>
                </ul>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-serif font-bold mb-4 gold-text">Procédure de Retour</h2>
                <ol class="list-decimal pl-6 space-y-2">
                    <li>Contactez notre service client à <a href="mailto:retours@luxe-jewelry.com" class="gold-text hover:underline">retours@luxe-jewelry.com</a></li>
                    <li>Emballer soigneusement l'article dans son emballage d'origine</li>
                    <li>Envoyez le colis à l'adresse suivante :
                        <address class="not-italic mt-2">
                            Luxe Jewelry - Service Retours<br>
                            123 Avenue Montaigne<br>
                            75008 Paris, France
                        </address>
                    </li>
                </ol>
            </section>

            <section>
                <h2 class="text-2xl font-serif font-bold mb-4 gold-text">Remboursements</h2>
                <p>Les remboursements seront effectués sous 14 jours ouvrables après réception et inspection de l'article.</p>
                <p class="mt-2">Les frais de retour sont à la charge du client, sauf en cas d'erreur de notre part.</p>
            </section>
        </div>
    </div>
</main>

<?php 
include 'templates/newsletter.php';
include 'templates/footer.php';
?>