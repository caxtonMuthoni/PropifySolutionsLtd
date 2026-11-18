<div>
    <p class="mb-4 text-sm text-muted">Forgot your password? Enter your email address and we'll email you a link to choose a new one.</p>
    <x-form.status class="mb-4" :status="session('status')" />
    <form wire:submit="sendPasswordResetLink" class="flex flex-col gap-5">
        <x-form.field name="email" label="Email" type="email" required autofocus />
        <button type="submit" class="btn-primary" wire:loading.attr="disabled">Email password reset link</button>
    </form>
</div>
