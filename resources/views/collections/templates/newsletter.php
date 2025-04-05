<section class="py-16 bg-gray-800 text-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-serif font-bold mb-4">Abonnez-vous à notre newsletter</h2>
        <p class="text-gray-300 mb-8">Recevez en exclusivité nos nouvelles collections et offres spéciales</p>
        
        <form action="newsletter-subscribe.php" method="POST" class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
            <input type="email" name="email" placeholder="Votre email" required
                   class="flex-grow px-4 py-3 rounded-full text-gray-800 focus:outline-none focus:ring-2 focus:ring-yellow-500">
            <button type="submit" class="gold-bg text-white px-6 py-3 rounded-full hover:bg-yellow-600 transition font-medium">
                S'abonner
            </button>
        </form>
        
        <p class="mt-4 text-xs text-gray-400">
            En vous abonnant, vous acceptez notre <a href="confidentialite.php" class="underline hover-gold">politique de confidentialité</a>.
        </p>
    </div>
</section>