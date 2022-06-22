<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <div style="text-align: center">
                <img style="width: 100px; height: auto; border-radius: 50%; margin: auto; margin-bottom: 10px;" class="brand-logo" src="/img/Eude.jpg" alt="">
                <h3>Eude Rafael de Souza</h3>
            </div>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Manter-me logado') }}</span>
                </label>
            </div>

            <div class="flex items-center mt-4">
                <div class="flex items-center justify-start mt-4 mr-3">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                            {{ __('Cadastre-se aqui!') }}
                        </a>
                    @endif
                </div>

                <div class="flex items-center justify-end mt-4 ml-3">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Esqueceu sua senha?') }}
                        </a>
                    @endif

                    <x-jet-button class="ml-4">
                        {{ __('Logar') }}
                    </x-jet-button>
                </div>

                
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
