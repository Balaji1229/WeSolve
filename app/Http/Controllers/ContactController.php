<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use App\Models\ContactMessage;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $contactInfo = [
            'email' => Setting::get('contact_email', 'info@wesolvetechnologies.com'),
            'phone' => Setting::get('contact_phone', '+1 234 567 890'),
            'whatsapp' => Setting::get('contact_whatsapp', '+1 234 567 890'),
            'address' => Setting::get('contact_address', '123 Street, City, Country'),
            'map_iframe' => Setting::get('contact_map', ''),
        ];

        $socialLinks = [
            'instagram' => Setting::get('social_instagram'),
            'twitter' => Setting::get('social_twitter'),
            'facebook' => Setting::get('social_facebook'),
            'threads' => Setting::get('social_threads'),
            'github' => Setting::get('social_github'),
        ];

        return view('contact', compact('contactInfo', 'socialLinks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'service' => 'nullable|string|max:255',
            'service_other' => 'nullable|string|max:255|required_if:service,Others',
            'message' => 'required|string|max:5000',
        ]);

        // If "Others" was chosen, store the custom requirement as the service.
        if (($validated['service'] ?? null) === 'Others' && ! empty($validated['service_other'])) {
            $validated['service'] = $validated['service_other'];
        }
        unset($validated['service_other']);

        $contact = ContactMessage::create($validated);

        // Send the notification straight away (normal synchronous mail). A mail
        // failure must never block the user's submission, so it is logged only.
        $recipients = config('contact.recipients', []);
        if (! empty($recipients)) {
            try {
                Mail::to($recipients)->send(new ContactFormSubmitted($contact));
            } catch (\Throwable $e) {
                Log::error('Contact form notification email failed: ' . $e->getMessage());
            }
        }

        $successMessage = 'Thank you for your message. We will get back to you soon!';

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
            ]);
        }

        return redirect()->route('contact')->with('success', $successMessage);
    }
}
