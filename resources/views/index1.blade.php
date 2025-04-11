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
        }
        
        .jewelry-logo {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 2.5rem;
            position: relative;
            display: inline-block;
            color: var(--dark);
            text-transform: uppercase;
            letter-spacing: 2px;
            padding-bottom: 10px;
        }
        
        .jewelry-logo::before {
            content: "";
            position: absolute;
            width: 25px;
            height: 25px;
            background: var(--gold);
            border-radius: 50%;
            top: -8px;
            left: -15px;
            z-index: -1;
            opacity: 0.3;
        }
        
        .jewelry-logo::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), transparent);
        }
        
        .jewelry-logo span {
            position: relative;
            display: inline-block;
        }
        
        .jewelry-logo span::before {
            content: "♦";
            position: absolute;
            color: var(--gold);
            font-size: 0.8rem;
            top: -12px;
            right: -8px;
        }
        
        .jewelry-logo:hover {
            color: var(--gold);
            transition: color 0.3s ease;
        }
        
        .jewelry-logo:hover::before {
            transform: scale(1.2);
            transition: transform 0.3s ease;
        }
        
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--light-bg);
            color: var(--dark);
            line-height: 1.6;
            padding-top: 80px; /* Espace pour la navbar fixe */
        }
        
        /* Barre de navigation fixe */
        .fixed-navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px 0;
        }
        /* Styles existants préservés */
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
            padding-top: 80px; /* Ajouté pour la navbar fixe */
        }

        /* Barre fixe ajoutée */
        .fixed-nav {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        /* Zone grise avec images */
        .hero-bg {
            background-color: #f5f5f5;
            position: relative;
            height: 80vh;
            overflow: hidden;
        }
        
        .hero-image {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        
        .hero-image.active {
            opacity: 0.9;
        }
        /* Style pour le logo image */
        .logo-img {
            height: 50px;
            width: auto;
            transition: transform 0.3s ease;
        }
        
        .logo-img:hover {
            transform: scale(1.05);
        }
        
        /* Boutons */
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
        
        /* Section Hero avec images en arrière-plan */
        .hero-section {
            position: relative;
            height: 80vh;
            overflow: hidden;
            background-color:rgb(42, 41, 38); /* Zone grise demandée */
        }
        
        .hero-bg-image {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }
        
        .hero-bg-image.active {
            opacity: 0.8; /* Transparence pour mieux voir le texte */
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        /* Section Contact inchangée */
        .contact-section {
            max-width: 800px;
            margin: 4rem auto;
            padding: 3rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

    <!-- Barre de navigation fixe -->
    <nav class="fixed-navbar">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-8">
        <a href="/" class="jewelry-logo">
    <span>J</span>ewelry
</a>
            
            <div class="flex items-center space-x-4">
                <a href="#contact" class="btn-outline px-6 py-2 rounded-full font-medium flex items-center">
                    <i class="fas fa-envelope mr-2"></i>Contactez-nous
                </a>
                <a href="{{ route('login') }}" class="btn-outline px-6 py-2 rounded-full font-medium flex items-center">
                    <i class="fas fa-user mr-2"></i>Connexion
                </a>
                <a href="{{ route('register') }}" class="btn-gold px-6 py-2 rounded-full font-medium flex items-center">
                    <i class="fas fa-user-plus mr-2"></i>Inscription
                </a>
            </div>
        </div>
    </nav>
    
    
    <!-- Hero Section avec images en arrière-plan -->
    <section class="hero-section">
        <!-- Images dynamiques en arrière-plan gris -->
        <img src="C:\xampp\htdocs\bijouterie-laravel\public/images/img1.jpeg" class="hero-bg-image active" alt="Bijoux en or">
        <img src="public/images/img2.jpeg" class="hero-bg-image" alt="Montres de luxe">
        <img src="public/images/img3.jpeg" class="hero-bg-image" alt="Montres de luxe">
        <img src="public/images/img4.jpeg" class="hero-bg-image" alt="Bagues artisanales">
        
        <div class="hero-content h-full flex flex-col justify-center items-center text-center px-4">
            <h2 class="text-4xl md:text-6xl font-serif font-bold text-white mb-6 leading-tight">Bijoux Exceptionnels</h2>
            <p class="text-xl md:text-2xl text-white mb-8 max-w-2xl">Découvrez notre collection exclusive de bijoux artisanaux</p>
            <a href="{{route('dashboard.collections')}}" class="btn-gold px-8 py-3 rounded-full text-lg font-medium">
                Découvrir nos créations <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="max-w-4xl mx-auto my-16 px-4">
        <h2 class="text-3xl font-serif font-bold text-center mb-10">Nouveautés Bijouterie-LUXE</h2>
        <p class="text-center mb-4">Les mains expertes de nos 150 artisans maîtrisent les bons gestes, transforment la matière et réalisent entre 10 et 40 étapes de fabrication pour que chaque bijou raconte une histoire, révèle une personnalité et incarne un savoir-faire unique et propre à émerveiller les amoureux de l'art.</p>
        <p class="text-center">Nous proposons des créations uniques de bijoux. L'expression créative de notre équipe artistique constitué de: GOUHI KARIMA, FATIM EZZAHERA HAMDAOUI et JAMILA LAGHMAMI n'a de cesse de se réinventer en proposant des collections pour femme aux histoires surprenantes et inattendues, dans le respect de la biodiversité. Bijouterie-LUXE, c'est aussi une gamme de bracelets et de bagues pour homme, des bijoux « Les Essentiels » pour vous accompagner au quotidien.</p>
    </section>

    <!-- Contact Section (inchangée) -->
    <section id="contact" class="contact-section">
        <h2 class="text-3xl font-serif font-bold text-center mb-10">Contactez-nous</h2>
        
        <form method="POST" action="{{ route('contact.send') }}">
            @csrf
            
            <div class="mb-6">
                <label for="name" class="block mb-2 font-medium">Nom:</label>
                <input type="text" name="name" required class="w-full p-3 border rounded">
            </div>
            
            <div class="mb-6">
                <label for="email" class="block mb-2 font-medium">Email:</label>
                <input type="email" name="email" required class="w-full p-3 border rounded">
            </div>
            
            <div class="mb-6">
                <label for="message" class="block mb-2 font-medium">Message:</label>
                <textarea name="message" required class="w-full p-3 border rounded" rows="5"></textarea>
            </div>
            
            <button type="submit" class="btn-gold px-8 py-3 rounded-full text-lg font-medium w-full">
                Envoyer <i class="fas fa-paper-plane ml-2"></i>
            </button>
        </form>
        
        <div class="mt-12 text-center">
            <h3 class="text-xl font-medium mb-6">Nos coordonnées</h3>
            <p class="mb-2"><i class="fas fa-map-marker-alt gold-text mr-2"></i> 123 Avenue des Bijoux, 75001 Rabat</p>
            <p class="mb-2"><i class="fas fa-phone gold-text mr-2"></i> +212 6 51 57 68 97</p>
            <p class="mb-6"><i class="fas fa-envelope gold-text mr-2"></i> contact@luxe-jewelry.com</p>
            
            <div class="flex justify-center space-x-6">
                <a href="https://www.facebook.com/share/1649weVhTD/" class="text-gray-700 hover:text-gold-500"><i class="fab fa-facebook-f text-2xl"></i></a>
                <a href="https://www.instagram.com/f__ati16?igsh=MWV6MHlicm9peTJndg==" class="text-gray-700 hover:text-gold-500"><i class="fab fa-instagram text-2xl"></i></a>
                <a href="#" class="text-gray-700 hover:text-gold-500"><i class="fab fa-twitter text-2xl"></i></a>
                
            </div>
        </div>
    </section>

    <script>
        // Diaporama des images en arrière-plan
        let currentImage = 0;
        const images = document.querySelectorAll('.hero-bg-image');
        
        function changeBackgroundImage() {
            images[currentImage].classList.remove('active');
            currentImage = (currentImage + 1) % images.length;
            images[currentImage].classList.add('active');
        }
        
        setInterval(changeBackgroundImage, 5000);
        
        // Smooth scroll pour le bouton Contactez-nous
        document.querySelector('a[href="#contact"]').addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    </script>
</body>
</html>