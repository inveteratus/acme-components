<x-layouts.app>

    <main class="profile">

        <div x-data="{tab:$persist(0).as('user-profile.tab')}">
            <nav>

                <button type="button" @click.stop.prevent="tab=0">
                    <i class="bi-person"></i>
                    <span>Personal Details</span>
                </button>
                <button type="button" @click.stop.prevent="tab=1">
                    <i class="bi-envelope"></i>
                    <span>Verify Email</span>
                </button>
                <button type="button" @click.stop.prevent="tab=2">
                    <i class="bi-key"></i>
                    <span>Change Password</span>
                </button>

            </nav>

            <div class="tabs">

                <x-acme::form :action="route('user-profile.basics-details')" method="put" x-cloak x-show="tab==0">
                    <x-acme::input.text name="name" maxlength="255" :value="auth()->user()->name" autofocus required autocomplete="name" />
                    <x-acme::input.email :value="old('email')" maxlength="255" :value="auth()->user()->email" required autocomplete="email" />

                    <div class="footer">
                        <x-acme::button.submit caption="Update information" />
                    </div>
                </x-acme::form>

                <x-acme::form action="#" method="put" x-cloak x-show="tab==1">
                    @if (auth()->user()->hasVerifiedEmail())
                        <p class="help">Your email address has already been verified.</p>
                    @else
                        <p class="help">Your email address has not been verified.</p>
                        <div class="footer">
                            <x-acme::button.submit caption="Resend verification link" />
                        </div>
                    @endif
                </x-acme::form>

                <x-acme::form :action="route('user-profile.change-password')" method="put" x-cloak x-show="tab==2">
                    <x-acme::input.password name="current_password" label="Current Password" required autocomplete="current-password" />
                    <x-acme::input.password name="password" label="New Password" required autocomplete="new-password" />

                    <div class="footer">
                        <x-acme::button.submit caption="Update password" />
                    </div>
                </x-acme::form>

            </div>
        </div>

    </main>

</x-layouts.app>
