<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxe Jewelry - Bijoux de Luxe</title>
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
            background-color: var(--light-bg);
            color: var(--dark);
            line-height: 1.6;
        }
        
        .header-background {
            position: relative;
            width: 100%;
            height: 80vh;
            overflow: hidden;
        }
        
        .header-background img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 1.25s ease-in-out;
        }
        
        .header-background img.active {
            opacity: 1;
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.5) 100%);
            z-index: 1;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .gold-text {
            color: var(--gold);
        }
        
        .gold-bg {
            background-color: var(--gold);
        }
        
        .gold-border {
            border-color: var(--gold);
        }
        
        .hover-gold:hover {
            color: var(--gold);
        }
        
        .nav-link {
            position: relative;
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: var(--gold);
            transition: width 0.3s;
        }
        
        .nav-link:hover:after {
            width: 100%;
        }
        
        .intro-section {
            max-width: 800px;
            margin: 4rem auto;
            padding: 0 2rem;
        }
        
        .intro-section p {
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
            text-align: center;
            color: #555;
        }
        
        .section-title {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
            letter-spacing: 0.5px;
            position: relative;
            margin-bottom: 2.5rem;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 2px;
            background: var(--gold);
        }
        
        .newsletter {
            background: linear-gradient(135deg, var(--dark) 0%, #1a2a3a 100%);
            padding: 5rem 2rem;
            text-align: center;
        }
        
        .btn-gold {
            background-color: var(--gold);
            color: white;
            transition: all 0.3s;
        }
        
        .btn-gold:hover {
            background-color: #b5952e;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }
        
        .btn-outline {
            border: 1px solid var(--dark);
            transition: all 0.3s;
        }
        
        .btn-outline:hover {
            border-color: var(--gold);
            color: var(--gold);
        }
    </style>
</head>
<body class="pt-16">

    <!-- Navbar -->
    <nav class="bg-white text-gray-800 py-4 px-8 shadow-sm fixed w-full z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold gold-text font-serif tracking-tight">LUXE</h1>
        
            <div class="flex items-center space-x-4">         
                <div class="flex space-x-4">
                    <a href="{{ route('login') }}" class="btn-outline px-6 py-2 rounded-full font-medium flex items-center">
                        <i class="fas fa-user mr-2"></i>Connexion
                    </a>
                    <a href="{{ route('register') }}" class="btn-gold px-6 py-2 rounded-full font-medium flex items-center">
                        <i class="fas fa-user-plus mr-2"></i>Inscription
                    </a>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <section class="header-background">
        <img src="../site_eco/images/IMG-20250323-WA0006.jpg" class="active" alt="Bijoux en or et diamants">
        <img src="../site_eco/images/IMG-20250328-WA0012.jpg" alt="Collection de montres de luxe">
        <img src="../site_eco/images/IMG-20250328-WA0016.jpg" alt="Bagues artisanales">
        <div class="hero-overlay"></div>
        <div class="hero-content h-full flex flex-col justify-center items-center text-center px-4">
            <h2 class="text-4xl md:text-6xl font-serif font-bold text-white mb-6 leading-tight">Bijoux Exceptionnels</h2>
            <p class="text-xl md:text-2xl text-white mb-8 max-w-2xl">Découvrez notre collection exclusive de bijoux artisanaux</p>
            <a href="{{route('collection.index')}}" class="btn-gold px-8 py-3 rounded-full text-lg font-medium">
                Découvrir nos créations <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="intro-section">
        <h2 id="collections" class="section-title text-3xl text-center">Nouveautés Bijouterie-LUXE</h2>
        <p>Les mains expertes de nos 150 artisans maîtrisent les bons gestes, transforment la matière et réalisent entre 10 et 40 étapes de fabrication pour que chaque bijou raconte une histoire, révèle une personnalité et incarne un savoir-faire unique et propre à émerveiller les amoureux de l'art.</p>
        <p>Nous proposons des créations uniques de bijoux. L'expression créative de notre équipe artistique constitué de: GOUHI KARIMA, FATIM EZZAHERA HAMDAOUI et JAMILA LAGHMAMI n'a de cesse de se réinventer en proposant des collections pour femme aux histoires surprenantes et inattendues, dans le respect de la biodiversité. Bijouterie-LUXE, c'est aussi une gamme de bracelets et de bagues pour homme, des bijoux « Les Essentiels » pour vous accompagner au quotidien.</p>
    </section>

    <!-- Newsletter -->
    <section class="newsletter">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-3xl font-serif font-bold mb-4 text-white">Abonnez-vous à notre newsletter</h2>
            <p class="text-gray-300 mb-8 text-lg">Recevez en exclusivité nos nouvelles collections et offres spéciales</p>
            <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                <input type="email" placeholder="Votre email" 
                       class="flex-grow px-6 py-3 rounded-full text-gray-800 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                <button type="submit" class="btn-gold px-8 py-3 rounded-full font-medium">
                    S'abonner <i class="fas fa-paper-plane ml-2"></i>
                </button>
            </form>
            <p class="mt-6 text-sm text-gray-400">
                En vous abonnant, vous acceptez notre politique de confidentialité.
            </p>
        </div>
    </section>

    <script>
        // Diaporama
        let index = 0;
        function changeSlide() {
            let images = document.querySelectorAll(".header-background img");
            images.forEach((img, i) => img.classList.remove("active"));
            images[index].classList.add("active");
            index = (index + 1) % images.length;
        }
        setInterval(changeSlide, 5000);
    </script>
</body>
</html>