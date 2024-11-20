<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects', compact('projects'));
    }

            
    public function show($id)
    {
        $project = Project::with('images')->findOrFail($id);
        return view('projectdetail', compact('project'));
    }


}

