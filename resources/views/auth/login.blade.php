<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#f9f7f5] px-4">
        <div class="max-w-md w-full bg-white rounded-lg shadow-xl p-8 space-y-6">

            <!-- Logo -->
            <div class="text-center">
                <a href="/" class="text-4xl font-serif font-bold logo-jewelry">
                    <span class="gold-text">J</span>EWELRY
                </a>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 p-4 rounded-md bg-gray-50 border border-gold-500 text-gray-700" 
                                   :status="session('status')" />

            <!-- Formulaire -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="gold-text font-medium" />
                    <x-text-input id="email" 
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gold-500 focus:ring-gold-500" 
                                  type="email" 
                                  name="email" 
                                  :value="old('email')" 
                                  required 
                                  autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 text-sm" />
                </div>

                <!-- Mot de passe -->
                <div>
                    <x-input-label for="password" :value="__('Mot de passe')" class="gold-text font-medium" />
                    <x-text-input id="password" 
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gold-500 focus:ring-gold-500" 
                                  type="password" 
                                  name="password" 
                                  required 
                                  autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 text-sm" />
                </div>

                <!-- Se souvenir de moi + Mot de passe oublié -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" 
                               type="checkbox" 
                               class="rounded border-gray-300 text-gold-600 shadow-sm focus:ring-gold-500" 
                               name="remember">
                        <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 hover:text-gold-700 underline" href="{{ route('password.request') }}">
                            Mot de passe oublié ?
                        </a>
                    @endif
                </div>

                <!-- Bouton Connexion -->
                <div>
                    <button type="submit"
                        class="w-full py-3 px-4 bg-gold-600 hover:bg-gold-700 text-white font-semibold rounded-full shadow-md transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gold-500">
                        Connexion
                    </button>
                </div>

                <!-- Lien inscription -->
                <div class="text-center text-sm text-gray-600">
                    Pas encore membre ? 
                    <a href="{{ route('register') }}" class="text-gold-600 hover:text-gold-700 underline">
                        Créer un compte
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- STYLES PERSO -->
    <style>
        :root {
            --gold: #d4af37;
        }

        .logo-jewelry {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .gold-text {
            color: var(--gold);
        }

        .text-gold-600 {
            color: var(--gold);
        }

        .hover\:text-gold-700:hover {
            color: #b5952e;
        }

        .bg-gold-600 {
            background-color: var(--gold);
        }

        .hover\:bg-gold-700:hover {
            background-color: #b5952e;
        }

        .focus\:ring-gold-500:focus {
            --tw-ring-color: rgba(212, 175, 55, 0.5);
        }

        .border-gold-500 {
            border-color: var(--gold);
        }
    </style>
</x-guest-layout>
