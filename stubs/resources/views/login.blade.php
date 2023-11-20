<x-layouts.app>

    <main class="auth">
        <x-acme::form action="{{ route('login') }}">

            <x-acme::input.email :value="old('email')" maxlength="255" autofocus required autocomplete="email" />
            <x-acme::input.password required autocomplete="current-password" />

            <div class="footer">
                <x-acme::button.submit caption="Login" />
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="link">Forgot your password ?</a>
                @endif
            </div>
        </x-acme::form>

        @if (Route::has('register'))
            <a href="{{ route('register') }}">Not got an account yet ?</a>
        @endif
    </main>

</x-layouts.app>
