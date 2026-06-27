<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Setting;
use Illuminate\Http\Request;

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
            'message' => 'required|string|max:5000',
        ]);

        ContactMessage::create($validated);

        return redirect()->route('contact')
            ->with('success', 'Thank you for your message. We will get back to you soon!');
    }
}
