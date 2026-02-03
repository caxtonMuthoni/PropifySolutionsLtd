<?php

namespace App\Http\Controllers;

use App\Mail\NotifyContactFormMessageRecievedMail;
use App\Models\Contact;
use App\Services\TurnstileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index()
    {

        return Inertia::render('Contact/Index', [
            'contactInfo' => [
                'emails' => [
                    'general' => 'hello@propify.co.ke',
                ],
                'phones' => [
                    'primary' => '+254743751575',
                ],
                'officeHours' => [
                    'Monday - Friday' => '9:00 AM - 6:00 PM',
                    'Saturday' => '10:00 AM - 2:00 PM',
                    'Sunday' => 'Closed',
                ]
            ]
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'token' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|min:10|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            'timeline' => 'required|string|in:urgent,1-3months,3-6months,flexible,not-sure',
            'budget' => 'required|string|in:under-5k,5k-15k,15k-50k,50k-plus,not-sure,confidential',
            'preferred_contact' => 'required|string|in:email,phone,meeting,video',

        ]);

        // Here you would typically:
        // 1. Verify token
        $token = $validated['token'];
        $turnstileService = new TurnstileService();
        $response = $turnstileService->validate(
            token: $token
        );

        if ($response['success'] ?? false) {
            // 2. Store in database
            $contact = new Contact();
            $contact->name = $validated['name'];
            $contact->email = $validated['email'];
            $contact->phone = $validated['phone'];
            $contact->subject = $validated['subject'];
            $contact->message = $validated['message'];
            $contact->timeline = $validated['timeline'];
            $contact->budget = $validated['budget'];
            $contact->preferred_contact = $validated['preferred_contact'];
            $contact->save();
            // 3. Send email notification

            Mail::to($contact->email)->send(new NotifyContactFormMessageRecievedMail($contact));

            return back()->with([
                'success' => 'Thank you for your message! We\'ll get back to you within 24 hours.'
            ]);
        }

        return redirect()->back()->withErrors([
            'token' => "We couldn't verify that you're human. Please refresh the page and try again."
        ]);
    }
}
