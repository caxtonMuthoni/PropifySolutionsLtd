<?php

namespace App\Livewire;

use App\Mail\NotifyContactFormMessageRecievedMail;
use App\Models\Contact;
use App\Services\Content\ServiceCatalog;
use App\Services\TurnstileService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Locked;
use Livewire\Component;

class ContactForm extends Component
{
    public string $token = '';

    public string $name = '';

    public string $email = '';

    public string $phone = '';

    public string $subject = '';

    public string $message = '';

    public string $timeline = '';

    public string $budget = '';

    public string $preferred_contact = 'email';

    #[Locked]
    public bool $submitted = false;

    public function mount(ServiceCatalog $services, ?string $service = null, ?string $type = null): void
    {
        $this->subject = $services->find((string) $service)['short_title'] ?? '';
        $this->preferred_contact = $type === 'call' ? 'meeting' : 'email';
    }

    /**
     * @return array<string, string>
     */
    protected function rules(): array
    {
        return [
            'token' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|min:10|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10|max:5000',
            'timeline' => 'required|string|in:urgent,1-3months,3-6months,flexible,not-sure',
            'budget' => 'required|string|in:under-5k,5k-15k,15k-50k,50k-plus,not-sure,confidential',
            'preferred_contact' => 'required|string|in:email,phone,meeting,video',
        ];
    }

    /**
     * @return array<string, string>
     */
    protected function messages(): array
    {
        return [
            'token.required' => 'Please complete the security check before sending.',
            'phone.min' => 'Please enter a full phone number, including the country code.',
            'message.min' => 'Tell us a little more about your project (at least 10 characters).',
            'timeline.in' => 'Please choose a timeline from the list.',
            'budget.in' => 'Please choose a budget range from the list.',
            'preferred_contact.in' => 'Please choose how you would like us to contact you.',
        ];
    }

    public function submit(TurnstileService $turnstile): void
    {
        $throttleKey = 'contact-form:'.request()->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $this->addError('message', 'Too many messages sent. Please try again in a minute or email us directly.');

            return;
        }

        $validated = $this->validate();

        RateLimiter::hit($throttleKey);

        $verification = $turnstile->validate(token: $validated['token'], remoteIp: request()->ip());

        if (! ($verification['success'] ?? false)) {
            $this->reset('token');
            $this->dispatch('turnstile-reset');
            $this->addError('token', "We couldn't verify that you're human. Please try the security check again.");

            return;
        }

        $contact = new Contact;
        $contact->name = $validated['name'];
        $contact->email = $validated['email'];
        $contact->phone = $validated['phone'];
        $contact->subject = $validated['subject'];
        $contact->message = $validated['message'];
        $contact->timeline = $validated['timeline'];
        $contact->budget = $validated['budget'];
        $contact->preferred_contact = $validated['preferred_contact'];
        $contact->save();

        Mail::to($contact->email)->send(new NotifyContactFormMessageRecievedMail($contact));

        $this->reset('token', 'name', 'email', 'phone', 'subject', 'message', 'timeline', 'budget');
        $this->submitted = true;
        $this->dispatch('turnstile-reset');
    }

    public function render(ServiceCatalog $services): View
    {
        return view('livewire.contact-form', [
            'services' => $services->all(),
            'turnstileSiteKey' => config('services.turnstile.site_key'),
        ]);
    }
}
