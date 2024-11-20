<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        // Fetch all services
        $services = Service::all();

        // Decode JSON 'details' for each service
        $services->each(function ($service) {
            $service->details = json_decode($service->details, true); // Decode into an array
        });

        return view('services', compact('services'));
    }

    public function show($id)
    {
        // Fetch specific service with related images
        $service = Service::with('images')->findOrFail($id);

        // Decode JSON 'details' for this service
        $service->details = json_decode($service->details, true);

        return view('servicedetail', compact('service'));
    }
}

