<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::all(); 
        $services = Service::all(); 

        return view('home', compact('projects', 'services'));
    }

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

        return redirect()->route('home.submit')->with('success', 'Your message has been sent successfully!')->withFragment('contact-form');
    }
}


