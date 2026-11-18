<x-layouts.app :seo="$seo">
    <x-ui.page-hero eyebrow="Contact" title="Let's talk about your project" description="Tell us what you're building. We reply within 24 hours with next steps — or book a free 30-minute call with an engineer." :breadcrumbs="[['label' => 'Contact']]" />

    <section class="section pt-0">
        <div class="container-page grid gap-8 lg:grid-cols-12">
            <aside class="flex flex-col gap-4 lg:col-span-4" aria-label="Contact details">
                <a href="mailto:{{ $contactInfo['email'] }}" class="card flex items-center gap-4 p-5 transition hover:border-primary-200">
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-primary-50 text-primary-600 dark:bg-primary-950 dark:text-primary-300"><x-icon name="mail" class="h-5 w-5" /></span>
                    <span><span class="block text-xs text-muted">Email</span><span class="font-semibold text-slate-950 dark:text-white">{{ $contactInfo['email'] }}</span></span>
                </a>
                <a href="tel:{{ $contactInfo['phone'] }}" class="card flex items-center gap-4 p-5 transition hover:border-primary-200">
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-primary-50 text-primary-600 dark:bg-primary-950 dark:text-primary-300"><x-icon name="phone" class="h-5 w-5" /></span>
                    <span><span class="block text-xs text-muted">Phone</span><span class="font-semibold text-slate-950 dark:text-white">{{ $contactInfo['phoneDisplay'] }}</span></span>
                </a>
                <a href="{{ $contactInfo['whatsapp'] }}" target="_blank" rel="noopener noreferrer" class="card flex items-center gap-4 p-5 transition hover:border-primary-200">
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 dark:bg-emerald-950 dark:text-emerald-300"><x-icon name="message-circle" class="h-5 w-5" /></span>
                    <span><span class="block text-xs text-muted">WhatsApp</span><span class="font-semibold text-slate-950 dark:text-white">Chat with us</span></span>
                </a>
                <div class="card p-5">
                    <p class="flex items-center gap-2 font-semibold text-slate-950 dark:text-white"><x-icon name="map-pin" class="h-4 w-4 text-primary-600" />{{ $contactInfo['address'] }}</p>
                    <p class="mt-4 flex items-center gap-2 text-sm font-semibold text-slate-950 dark:text-white"><x-icon name="clock" class="h-4 w-4 text-primary-600" />Office hours (EAT)</p>
                    <dl class="mt-2 flex flex-col gap-1 text-sm">
                        @foreach ($contactInfo['officeHours'] as $hours)
                            <div class="flex justify-between gap-4"><dt class="text-muted">{{ $hours['label'] }}</dt><dd class="font-medium">{{ $hours['display'] }}</dd></div>
                        @endforeach
                        <div class="flex justify-between gap-4"><dt class="text-muted">Sunday</dt><dd class="font-medium">Closed</dd></div>
                    </dl>
                </div>
                <div class="rounded-2xl bg-gradient-to-br from-primary-600 to-primary-800 p-6 text-white">
                    <p class="font-semibold">Serving clients in</p>
                    <p class="mt-1 text-sm text-primary-100">Nairobi · Kampala · Dar es Salaam · Lagos · Accra</p>
                </div>
            </aside>

            <div class="lg:col-span-8">
                <livewire:contact-form :service="request('service')" :type="request('type')" />
            </div>
        </div>
    </section>
</x-layouts.app>
