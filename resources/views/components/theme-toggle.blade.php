<button
    type="button"
    x-data="{
        dark: document.documentElement.classList.contains('dark'),
        toggle() {
            this.dark = ! this.dark;
            document.documentElement.classList.toggle('dark', this.dark);
            try { localStorage.setItem('darkMode', String(this.dark)); } catch (error) {}
        },
    }"
    x-on:click="toggle()"
    x-bind:aria-label="dark ? 'Switch to light mode' : 'Switch to dark mode'"
    aria-label="Toggle dark mode"
    {{ $attributes->merge(['class' => 'flex h-10 w-10 items-center justify-center rounded-xl text-slate-600 transition hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-white/10']) }}
>
    <x-icon name="sun" class="hidden h-5 w-5 dark:block" />
    <x-icon name="moon" class="h-5 w-5 dark:hidden" />
</button>
