<section class="card p-6 sm:p-8">
    <h2 class="text-lg font-semibold text-slate-950 dark:text-white">Update password</h2>
    <p class="mt-1 text-sm text-muted">Use a long, random password to keep your account secure.</p>
    <form wire:submit="updatePassword" class="mt-6 flex flex-col gap-5">
        <x-form.field name="current_password" label="Current password" type="password" autocomplete="current-password" />
        <x-form.field name="password" label="New password" type="password" autocomplete="new-password" />
        <x-form.field name="password_confirmation" label="Confirm password" type="password" autocomplete="new-password" />
        <div class="flex items-center gap-4">
            <button type="submit" class="btn-primary">Save</button>
            <p x-data="{ shown: false }" x-on:password-updated.window="shown = true; setTimeout(() => shown = false, 2000)" x-show="shown" x-cloak x-transition class="text-sm text-muted">Saved.</p>
        </div>
    </form>
</section>
