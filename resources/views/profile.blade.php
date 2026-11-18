<x-layouts.app title="Profile">
    <section class="container-page pb-24 pt-32">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h1 class="text-3xl font-semibold text-slate-950 dark:text-white">Profile</h1>
            <x-account-menu />
        </div>
        <div class="mt-8 flex max-w-2xl flex-col gap-6">
            <livewire:profile.update-profile-information-form />
            <livewire:profile.update-password-form />
            <livewire:profile.delete-user-form />
        </div>
    </section>
</x-layouts.app>
