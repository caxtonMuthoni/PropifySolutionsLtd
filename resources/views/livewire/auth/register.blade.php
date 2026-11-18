<div>
    <form wire:submit="register" class="flex flex-col gap-5">
        <x-form.field name="name" label="Name" required autofocus autocomplete="name" />
        <x-form.field name="email" label="Email" type="email" required autocomplete="username" />
        <x-form.field name="password" label="Password" type="password" required autocomplete="new-password" />
        <x-form.field name="password_confirmation" label="Confirm password" type="password" required autocomplete="new-password" />
        <div class="flex items-center justify-between gap-4">
            <a href="{{ route('login') }}" class="text-sm text-muted underline hover:text-primary-600">Already registered?</a>
            <button type="submit" class="btn-primary" wire:loading.attr="disabled">Register</button>
        </div>
    </form>
</div>
