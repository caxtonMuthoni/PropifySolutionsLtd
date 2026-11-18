<div>
    <p class="mb-4 text-sm text-muted">This is a secure area of the application. Please confirm your password before continuing.</p>
    <form wire:submit="confirmPassword" class="flex flex-col gap-5">
        <x-form.field name="password" label="Password" type="password" required autocomplete="current-password" />
        <button type="submit" class="btn-primary" wire:loading.attr="disabled">Confirm</button>
    </form>
</div>
