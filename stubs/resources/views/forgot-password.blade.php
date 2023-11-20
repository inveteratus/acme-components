<x-layouts.app>

    <main class="auth">
        <x-acme:::form>
            <p class="help">Enter your email address, and we will send out a password reset link.</p>
            <x-acme:::input.email :value="old('email')" autofocus required autocomplete="email" />
            <div class="footer">
                <div>
                    <x-acme:::button.submit caption="Send reset link" />
                    <x-acme:::button.cancel :href="route('login')" />
                </div>
            </div>
        </x-acme:::form>
    </main>

</x-layouts.app>
