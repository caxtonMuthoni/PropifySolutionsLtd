@php
    $contactOptions = [
        ['value' => 'email', 'label' => 'Email', 'icon' => 'mail'],
        ['value' => 'phone', 'label' => 'Phone', 'icon' => 'phone'],
        ['value' => 'meeting', 'label' => 'Meeting', 'icon' => 'users'],
        ['value' => 'video', 'label' => 'Video call', 'icon' => 'video'],
    ];
@endphp

<div
    class="card p-6 sm:p-10"
    x-data
    x-init="
        try {
            const prefill = JSON.parse(sessionStorage.getItem('propify:contact-prefill') ?? 'null');
            if (prefill && typeof prefill === 'object') {
                ['name', 'email', 'phone', 'subject', 'message', 'timeline', 'budget', 'preferred_contact']
                    .filter((key) => typeof prefill[key] === 'string')
                    .forEach((key) => $wire.set(key, prefill[key], false));
                sessionStorage.removeItem('propify:contact-prefill');
            }
        } catch (error) {}
    "
>
    <h2 class="text-2xl font-semibold text-slate-950 dark:text-white">Project enquiry</h2>

    @if ($submitted)
        <div class="mt-6 flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-800 dark:border-emerald-900 dark:bg-emerald-950/50 dark:text-emerald-200" role="status">
            <x-icon name="circle-check" class="mt-0.5 h-5 w-5 shrink-0" />
            <p>Thank you for your message! We'll get back to you within 24 hours.</p>
        </div>
    @endif

    <p class="mt-2 text-sm text-muted">Fields marked * are required.</p>

    <form
        wire:submit="submit"
        class="mt-8 grid gap-5 sm:grid-cols-2"
        toolname="submit_project_enquiry"
        tooldescription="Send a software project enquiry to Propify Solutions. A human verification step must be completed by the user before sending."
        novalidate
    >
        <div>
            <label for="name" class="mb-2 block text-sm font-medium">Full name *</label>
            <input id="name" wire:model="name" name="name" type="text" autocomplete="name" required class="form-input" aria-describedby=\"name-error\" @error('name') aria-invalid=\"true\" @enderror>
            @error('name') <p id="name-error" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="email" class="mb-2 block text-sm font-medium">Email *</label>
            <input id="email" wire:model="email" name="email" type="email" autocomplete="email" required class="form-input" aria-describedby=\"email-error\" @error('email') aria-invalid=\"true\" @enderror>
            @error('email') <p id="email-error" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="phone" class="mb-2 block text-sm font-medium">Phone (with country code) *</label>
            <input id="phone" wire:model="phone" name="phone" type="tel" autocomplete="tel" placeholder="+254 7XX XXX XXX" required class="form-input" aria-describedby=\"phone-error\" @error('phone') aria-invalid=\"true\" @enderror>
            @error('phone') <p id="phone-error" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="subject" class="mb-2 block text-sm font-medium">What do you need? *</label>
            <select id="subject" wire:model="subject" name="subject" required class="form-input" aria-describedby=\"subject-error\" @error('subject') aria-invalid=\"true\" @enderror>
                <option value="">Select a service</option>
                @foreach ($services as $service)
                    <option value="{{ $service['short_title'] }}">{{ $service['short_title'] }}</option>
                @endforeach
                <option value="General enquiry">General enquiry / not sure</option>
            </select>
            @error('subject') <p id="subject-error" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="timeline" class="mb-2 block text-sm font-medium">Timeline *</label>
            <select id="timeline" wire:model="timeline" name="timeline" required class="form-input" aria-describedby=\"timeline-error\" @error('timeline') aria-invalid=\"true\" @enderror>
                <option value="">Select a timeline</option>
                <option value="urgent">Urgent (under 1 month)</option>
                <option value="1-3months">1–3 months</option>
                <option value="3-6months">3–6 months</option>
                <option value="flexible">Flexible</option>
                <option value="not-sure">Not sure yet</option>
            </select>
            @error('timeline') <p id="timeline-error" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="budget" class="mb-2 block text-sm font-medium">Your budget (USD) *</label>
            <select id="budget" wire:model="budget" name="budget" required class="form-input" aria-describedby=\"budget-error\" @error('budget') aria-invalid=\"true\" @enderror>
                <option value="">Select a budget</option>
                <option value="under-5k">Under $5,000</option>
                <option value="5k-15k">$5,000 – $15,000</option>
                <option value="15k-50k">$15,000 – $50,000</option>
                <option value="50k-plus">$50,000+</option>
                <option value="not-sure">Not sure yet</option>
                <option value="confidential">Prefer not to say</option>
            </select>
            @error('budget') <p id="budget-error" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
        </div>
        <fieldset class="sm:col-span-2">
            <legend class="mb-2 block text-sm font-medium">Preferred contact method *</legend>
            <div class="grid grid-cols-2 gap-2 sm:grid-cols-4">
                @foreach ($contactOptions as $option)
                    <label
                        class="flex cursor-pointer items-center justify-center gap-2 rounded-xl border px-3 py-3 text-sm font-medium transition has-[:checked]:border-primary-600 has-[:checked]:bg-primary-50 has-[:checked]:text-primary-700 has-[:focus-visible]:ring-2 has-[:focus-visible]:ring-primary-500 border-slate-200 hover:border-slate-300 dark:border-white/10 dark:has-[:checked]:bg-primary-950 dark:has-[:checked]:text-primary-200"
                    >
                        <input wire:model="preferred_contact" type="radio" name="preferred_contact" value="{{ $option['value'] }}" class="sr-only">
                        <x-icon :name="$option['icon']" class="h-4 w-4" />{{ $option['label'] }}
                    </label>
                @endforeach
            </div>
            @error('preferred_contact') <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
        </fieldset>
        <div class="sm:col-span-2">
            <label for="message" class="mb-2 block text-sm font-medium">Tell us about your project *</label>
            <textarea id="message" wire:model="message" name="message" rows="6" required class="form-input" placeholder="What are you building, who is it for, and what does success look like?" aria-describedby=\"message-error\" @error('message') aria-invalid=\"true\" @enderror></textarea>
            @error('message') <p id="message-error" class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
        </div>

        <div class="flex flex-col items-start gap-2 sm:col-span-2">
            @if ($turnstileSiteKey)
                <div
                    wire:ignore
                    x-data="{
                        widgetId: null,
                        render() {
                            this.widgetId = window.turnstile.render(this.$refs.widget, {
                                sitekey: @js($turnstileSiteKey),
                                theme: document.documentElement.classList.contains('dark') ? 'dark' : 'light',
                                callback: (token) => $wire.set('token', token, false),
                                'expired-callback': () => $wire.set('token', '', false),
                            });
                        },
                    }"
                    x-init="window.turnstile ? render() : window.addEventListener('turnstile-loaded', () => render(), { once: true })"
                    x-on:turnstile-reset.window="window.turnstile && widgetId !== null && window.turnstile.reset(widgetId)"
                >
                    <div x-ref="widget"></div>
                </div>
            @endif
            @error('token') <p class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
        </div>

        <div class="flex flex-col gap-4 sm:col-span-2 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-xs text-muted">By sending this form you agree to our <a href="{{ route('privacy') }}" class="underline">privacy policy</a>.</p>
            <button type="submit" class="btn-primary !px-8" wire:loading.attr="disabled" wire:target="submit">
                <x-icon name="loader-circle" class="h-4 w-4 animate-spin" wire:loading wire:target="submit" />
                <x-icon name="send" class="h-4 w-4" wire:loading.remove wire:target="submit" />
                <span wire:loading.remove wire:target="submit">Send message</span>
                <span wire:loading wire:target="submit">Sending…</span>
            </button>
        </div>
    </form>
</div>

@assets
    <script>
        window.onTurnstileLoad = () => window.dispatchEvent(new Event('turnstile-loaded'));
    </script>
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js?onload=onTurnstileLoad&render=explicit" async defer></script>
@endassets
