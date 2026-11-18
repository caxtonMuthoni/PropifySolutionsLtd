<section class="card p-6 sm:p-8">
    <h2 class="text-lg font-semibold text-slate-950 dark:text-white">Profile information</h2>
    <p class="mt-1 text-sm text-muted">Update your account's name and email address.</p>
    <form wire:submit="updateProfileInformation" class="mt-6 flex flex-col gap-5">
        <x-form.field name="name" label="Name" required autocomplete="name" />
        <div>
            <x-form.field name="email" label="Email" type="email" required autocomplete="username" />
            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                <p class="mt-2 text-sm text-muted">
                    Your email address is unverified.
                    <button type="button" wire:click.prevent="sendVerification" class="underline hover:text-primary-600">Re-send the verification email.</button>
                </p>
                @if (session('status') === 'verification-link-sent')
                    <x-form.status class="mt-2" status="A new verification link has been sent to your email address." />
                @endif
            @endif
        </div>
        <div class="flex items-center gap-4">
            <button type="submit" class="btn-primary">Save</button>
            <p x-data="{ shown: false }" x-on:profile-updated.window="shown = true; setTimeout(() => shown = false, 2000)" x-show="shown" x-cloak x-transition class="text-sm text-muted">Saved.</p>
        </div>
    </form>
</section>
