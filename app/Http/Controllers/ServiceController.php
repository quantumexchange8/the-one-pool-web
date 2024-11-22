<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        $services->each(function ($service) {
            $service->details = json_decode($service->details, true); 
        });

        return view('services', compact('services'));
    }

    public function show($id)
    {
        $service = Service::with('images')->findOrFail($id);

        $service->details = json_decode($service->details, true);

        return view('servicedetail', compact('service'));
    }
}

