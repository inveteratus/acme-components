<x-layouts.app>

    <main class="auth">
        <x-acme::form action="{{ route('verification.send') }}">
            <p class="help">Please click the link we sent you during registration to verify your email address.</p>
            <div class="footer">
                <x-acme::button.submit caption="Resend email" />
            </div>
        </x-acme::form>
    </main>

</x-layouts.app>
