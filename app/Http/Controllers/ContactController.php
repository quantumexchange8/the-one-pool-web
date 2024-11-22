<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'phonenumber' => 'required|numeric',
            'email' => 'required|email',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        return redirect()->route('contactus')->with('success', 'Your message has been sent successfully!')->withFragment('contact-form');
    }
}


