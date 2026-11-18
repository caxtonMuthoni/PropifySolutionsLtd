<x-layouts.app title="Dashboard">
    <section class="container-page pb-24 pt-32">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h1 class="text-3xl font-semibold text-slate-950 dark:text-white">Dashboard</h1>
            <x-account-menu />
        </div>
        <div class="card mt-8 p-6">You're logged in, {{ auth()->user()->name }}.</div>
    </section>
</x-layouts.app>
