<div>
    <form wire:submit="resetPassword" class="flex flex-col gap-5">
        <x-form.field name="email" label="Email" type="email" required autofocus autocomplete="username" />
        <x-form.field name="password" label="Password" type="password" required autocomplete="new-password" />
        <x-form.field name="password_confirmation" label="Confirm password" type="password" required autocomplete="new-password" />
        <button type="submit" class="btn-primary" wire:loading.attr="disabled">Reset password</button>
    </form>
</div>
