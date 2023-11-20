<x-layouts.app>

    <main class="auth">
        <x-acme::form action="{{ route('register') }}">

            <x-acme::input.text name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-acme::input.email :value="old('email')" maxlength="255" required autocomplete="email" />
            <x-acme::input.password required autocomplete="new-password" />

            <div class="footer">
                <x-acme::button.submit caption="Register" />
            </div>

        </x-acme::form>

        <a href="{{ route('login') }}">Already got an account ?</a>
    </main>

</x-layouts.app>
