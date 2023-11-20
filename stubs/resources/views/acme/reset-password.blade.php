<x-layouts.app>

    <main class="auth">
        <x-acme::form :action="route('password.update')">
            <x-acme::input.email :value="old('email', request()->email)" autofocus required autocomplete="email" />
            <x-acme::input.password required autocomplete="new-password" />
            <input type="hidden" name="token" value="{{ request()->token }}" />
            <div class="footer">
                <div>
                    <x-acme::button.submit caption="Reset password" />
                </div>
            </div>
        </x-acme::form>
    </main>

</x-layouts.app>
