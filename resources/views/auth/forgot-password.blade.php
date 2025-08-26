<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Olvidate tu contraseña? Escribe tu correo y te enviaremos un enlace.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between my-4">
            
            <x-link href="{{route('register')}}"
            >
                Crear tu cuenta
            </x-link>

            <x-link

                href="{{route('login')}}"

            >
                Ya tienes Cuenta?
            </x-link> 

        </div>

        <x-primary-button class="w-full justify-center">
            {{ __('Email de envio') }}
        </x-primary-button>

    </form>
</x-guest-layout>
