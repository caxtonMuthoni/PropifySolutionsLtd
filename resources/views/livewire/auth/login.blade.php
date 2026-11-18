<div>
    <x-form.status class="mb-4" :status="session('status')" />
    <form wire:submit="login" class="flex flex-col gap-5">
        <x-form.field name="email" label="Email" type="email" model="form.email" required autofocus autocomplete="username" />
        <x-form.field name="password" label="Password" type="password" model="form.password" required autocomplete="current-password" />
        <label for="remember" class="inline-flex items-center gap-2 text-sm text-muted">
            <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500 dark:border-white/20 dark:bg-ink-950">
            Remember me
        </label>
        <div class="flex items-center justify-between gap-4">
            <a href="{{ route('password.request') }}" class="text-sm text-muted underline hover:text-primary-600">Forgot your password?</a>
            <button type="submit" class="btn-primary" wire:loading.attr="disabled">Log in</button>
        </div>
    </form>
</div>
