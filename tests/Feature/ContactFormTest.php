<?php

use App\Livewire\ContactForm;
use App\Mail\NotifyContactFormMessageRecievedMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Features\SupportTesting\Testable;
use Livewire\Livewire;

function fillEnquiry(array $overrides = []): Testable
{
    $component = Livewire::test(ContactForm::class);

    foreach ([
        'token' => 'turnstile-token',
        'name' => 'Wanjiku Kamau',
        'email' => 'wanjiku@example.com',
        'phone' => '+254700000000',
        'subject' => 'Mobile Apps',
        'message' => 'We need a delivery app with M-Pesa checkout.',
        'timeline' => '1-3months',
        'budget' => '5k-15k',
        'preferred_contact' => 'email',
        ...$overrides,
    ] as $field => $value) {
        $component->set($field, $value);
    }

    return $component;
}

beforeEach(fn () => RateLimiter::clear('contact-form:127.0.0.1'));

it('renders the contact form on the contact page', function () {
    $this->get('/contact')->assertSeeLivewire(ContactForm::class);
});

it('stores an enquiry and sends a confirmation when verification passes', function () {
    Mail::fake();
    Http::fake(['challenges.cloudflare.com/*' => Http::response(['success' => true])]);

    fillEnquiry()
        ->call('submit')
        ->assertHasNoErrors()
        ->assertSet('submitted', true)
        ->assertSet('name', '')
        ->assertSee('Thank you for your message!');

    expect(Contact::query()->where('email', 'wanjiku@example.com')->exists())->toBeTrue();
    Mail::assertSent(NotifyContactFormMessageRecievedMail::class, fn ($mail) => $mail->hasTo('wanjiku@example.com'));
});

it('rejects the enquiry when human verification fails', function () {
    Mail::fake();
    Http::fake(['challenges.cloudflare.com/*' => Http::response(['success' => false])]);

    fillEnquiry()
        ->call('submit')
        ->assertHasErrors('token')
        ->assertSet('submitted', false);

    expect(Contact::query()->count())->toBe(0);
    Mail::assertNothingSent();
});

it('validates enquiry fields', function (array $overrides, string $field) {
    Http::fake();

    fillEnquiry($overrides)->call('submit')->assertHasErrors($field);

    Http::assertNothingSent();
})->with([
    'missing token' => [['token' => ''], 'token'],
    'invalid email' => [['email' => 'not-an-email'], 'email'],
    'short phone' => [['phone' => '123'], 'phone'],
    'short message' => [['message' => 'Hi'], 'message'],
    'unknown budget' => [['budget' => 'a-million'], 'budget'],
    'unknown timeline' => [['timeline' => 'yesterday'], 'timeline'],
    'unknown contact method' => [['preferred_contact' => 'pigeon'], 'preferred_contact'],
]);

it('rate limits repeated submissions', function () {
    Mail::fake();
    Http::fake(['challenges.cloudflare.com/*' => Http::response(['success' => true])]);

    foreach (range(1, 5) as $attempt) {
        fillEnquiry()->call('submit')->assertHasNoErrors();
    }

    fillEnquiry()->call('submit')->assertHasErrors('message');
    expect(Contact::query()->count())->toBe(5);
});

it('prefills the form from the requested service and call type', function () {
    Livewire::withQueryParams([])
        ->test(ContactForm::class, ['service' => 'mobile-app-development', 'type' => 'call'])
        ->assertSet('subject', 'Mobile Apps')
        ->assertSet('preferred_contact', 'meeting');
});
