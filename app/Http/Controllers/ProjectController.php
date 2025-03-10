<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $categories = Project::distinct()->pluck('category')->toArray();

        $query = Project::query();

        if ($request->has('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        if ($request->has('search') && !empty($request->search)) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $columns = ['title', 'description', 'category', 'location', 'client', 'date'];
                foreach ($columns as $column) {
                    $q->orWhere($column, 'LIKE', "%{$keyword}%");
                }
            });
        }
        
        $projects = $query->orderby('date', 'desc')->with('images')->get();

        $sideprojects = Project::orderBy('date', 'desc')->take(5)->get();

        return view('projects', compact('projects', 'categories', 'sideprojects'));
    }


    public function show($id)
    {

        $project = Project::with('images')->findOrFail($id);

        return view('project_detail', compact('project'));
    }
}
