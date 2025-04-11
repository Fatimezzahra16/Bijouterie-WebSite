<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-light-bg">
        <div class="max-w-md w-full space-y-8 p-8 bg-white rounded-lg shadow-xl">
            <!-- Logo -->
            <div class="text-center">
                <a href="/" class="logo-jewelry text-3xl">
                    <span class="gold-text">J</span>EWELRY
                </a>
            </div>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Mot de passe oublié ? Indiquez votre adresse email et nous vous enverrons un lien de réinitialisation.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 p-4 rounded-lg bg-gray-50 border border-gold-500 text-gray-700" 
                                 :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="gold-text font-medium" />
                    <x-text-input id="email" 
                                class="mt-1 block w-full rounded-lg border-gray-300 focus:border-gold-500 focus:ring-1 focus:ring-gold-500" 
                                type="email" 
                                name="email" 
                                :value="old('email')" 
                                required 
                                autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gold-700 underline">
                        ← Retour à la connexion
                    </a>

                    <button type="submit" 
                          class="py-3 px-6 rounded-full shadow-sm text-white bg-gold-600 hover:bg-gold-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gold-500 transition-all">
                        {{ __('Envoyer le lien') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        :root {
            --gold: #d4af37;
            --dark: #2c3e50;
            --light-bg: #f9f7f5;
        }

        .logo-jewelry {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            letter-spacing: 1px;
            position: relative;
        }

        .gold-text {
            color: var(--gold);
        }

        .bg-gold-600 {
            background-color: var(--gold);
        }

        .focus\:ring-gold-500:focus {
            --tw-ring-color: rgba(212, 175, 55, 0.5);
        }

        .border-gold-500 {
            border-color: var(--gold);
        }

        .hover\:bg-gold-700:hover {
            background-color: #b5952e;
        }
    </style>
</x-guest-layout>