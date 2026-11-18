<section class="card p-6 sm:p-8" x-data="{ confirming: {{ $errors->has('password') ? 'true' : 'false' }} }">
    <h2 class="text-lg font-semibold text-slate-950 dark:text-white">Delete account</h2>
    <p class="mt-1 text-sm text-muted">Once your account is deleted, all of its resources and data will be permanently deleted.</p>
    <button type="button" class="btn mt-6 bg-red-600 text-white hover:bg-red-700" x-on:click="confirming = true" x-show="! confirming">Delete account</button>
    <form wire:submit="deleteUser" class="mt-6 flex flex-col gap-4 rounded-xl border border-red-200 p-5 dark:border-red-900" x-show="confirming" x-cloak>
        <p class="text-sm font-medium text-slate-900 dark:text-white">Enter your password to permanently delete your account.</p>
        <x-form.field name="password" label="Password" type="password" autocomplete="current-password" />
        <div class="flex justify-end gap-3">
            <button type="button" class="btn-secondary" x-on:click="confirming = false">Cancel</button>
            <button type="submit" class="btn bg-red-600 text-white hover:bg-red-700">Delete account</button>
        </div>
    </form>
</section>
