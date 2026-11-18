<div>
    <p class="text-sm text-muted">Thanks for signing up! Before getting started, please verify your email address by clicking the link we just emailed to you. If you didn't receive it, we'll gladly send another.</p>
    @if (session('status') === 'verification-link-sent')
        <x-form.status class="mt-4" status="A new verification link has been sent to your email address." />
    @endif
    <div class="mt-6 flex items-center justify-between gap-4">
        <button type="button" wire:click="sendVerification" class="btn-primary">Resend verification email</button>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm text-muted underline hover:text-primary-600">Log out</button>
        </form>
    </div>
</div>
