<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Service;
use App\Models\ServiceSection;
use App\Models\ServiceDetail;
use App\Models\ServiceImage;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    /**
     * Get the number of admin, service and project
     */
    public function getStats()
    {
        $adminCount = User::count();
        $serviceCount = Service::count();
        $projectCount = Project::count();

        return response()->json([
            'admins' => $adminCount,
            'services' => $serviceCount,
            'projects' => $projectCount,
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function profile(Request $request): Response
    {
        return Inertia::render('Admin/Admin/AdminEdit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    public function adminList(Request $request)
    {
        return User::all();
    }

    /**
     * Create the user's profile information.
     */
    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return Inertia::location(route('admin.profile'));
    }

    
    /**
     * Display the service form.
     */
    public function service(): Response
    {
        return Inertia::render('Admin/Services/ServiceEdit');
    }

    /**
     * Display the service list.
     */
    public function serviceList()
    {
        $services = Service::with(['serviceSection', 'serviceSection.serviceDetail'])->get();

        $services->each(function ($service) {

            $service->load('images');

            $service->details = $service->serviceSection->map(function ($section) {
                return [
                    'id' => $section->id,
                    'title' => $section->title,
                    'items' => $section->serviceDetail->map(function ($items) {
                        return [
                            'id' => $items->id,
                            'item' => $items->item,
                        ];
                    }),
                ];
            });

        });

        return response()->json($services);
    }

    /**
     * Create the service information.
     */
    public function storeService(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'details' => 'required|array',
            'details.*.title' => 'required|string',
            'details.*.items' => 'required|array|min:1',
            'details.*.items.*' => 'required|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {
            DB::transaction(function () use ($request) {
                $service = Service::create([
                    'name' => $request->name,
                    'subtitle' => $request->subtitle,
                    'description' => $request->description,
                ]);

                foreach ($request->details as $section) {
                    $serviceSection = $service->serviceSection()->create([
                        'title' => $section['title'],
                    ]);

                    foreach ($section['items'] as $item) {
                        $serviceSection->serviceDetail()->create([
                            'item' => $item,
                        ]);
                    }
                }

                if ($request->hasFile('images')) {
                    $index = 1;

                    foreach ($request->file('images') as $file) {
                        $filename = 'service' . $index . '.' . $file->getClientOriginalExtension();
                        $destinationPath = public_path('assets/img/services/service' . $service->id);

                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0755, true);
                        }

                        $file->move($destinationPath, $filename);

                        $service->images()->create([
                            'image_path' => 'assets/img/services/service' . $service->id . '/' . $filename,
                        ]);

                        $index++;
                    }
                }
            });

            return redirect()->back()->with('success', 'Service created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('An error occurred while creating the service: ' . $e->getMessage());
        }
    }


    public function updateService(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
            'details' => 'required|array',
            
            'details.*.id' => 'nullable|integer', 
            'details.*.title' => 'required|string|max:255', 
            'details.*.items' => 'nullable|array',
            
            'details.*.items.*.id' => 'nullable|integer', 
            'details.*.items.*.item' => 'required|string|max:255', 
        ]);
        
        $service = Service::findOrFail($id);
        $service->update([
            'name' => $validatedData['name'],
            'subtitle' => $validatedData['subtitle'],
            'description' => $validatedData['description'],
        ]);
    
        foreach ($validatedData['details'] as $section) {
            if (isset($section['id']) && $section['id']) {
                $serviceSection = ServiceSection::where('id', $section['id'])->update([
                    'title' => $section['title'],
                ]);
            } else {
                $serviceSection = ServiceSection::create([
                    'service_id' => $service->id,
                    'title' => $section['title'],
                ]);
            }
        
            foreach ($section['items'] as $item) {
                if (isset($item['id']) && $item['id']) {
                    ServiceDetail::where('id', $item['id'])->update([
                        'item' => $item['item'],
                    ]);
                } 
                else if(isset($section['id']) && $section['id'])
                {
                    ServiceDetail::create([
                        'section_id' => $section['id'],
                        'item' => $item['item'],
                    ]);
                }
                else
                {
                    ServiceDetail::create([
                        'section_id' => $serviceSection->id,
                        'item' => $item['item'],
                    ]);
                }
            }
        }
        
        return redirect()->back();
    }

    /**
     * Delete the service information.
     */
    public function destroyService($id)
    {
        $service = Service::find($id);

        $service->delete();

        return redirect()->back();
    }

    /**
     * Delete the service image.
     */
    public function destroyServiceImage($id)
    {
        $image = ServiceImage::findOrFail($id);

        $image->delete();

        return redirect()->back();
    }

    /**
     * Delete the service detail.
     */
    public function destroyServiceDetail($id)
    {
        $detail = ServiceDetail::findOrFail($id);

        $detail->delete();

        return redirect()->back();
    }

    /**
     * Delete the service section.
     */
    public function destroyServiceSection($id)
    {
        $detail = ServiceSection::findOrFail($id);

        $detail->delete();

        return redirect()->back();
    }

    /**
     * Upload the service image.
     */
    public function uploadServiceImage(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $serviceId = $request->input('service_id');
        $uploadedImages = [];
        foreach ($request->file('images') as $image) {
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = $image->storeAs('assets/img/services/' . 'service' . $serviceId);
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
                $image->move($destinationPath, $filename);

            $uploadedImage = ServiceImage::create([
                'service_id' => $serviceId,
                'image_path' => $destinationPath . '/'. $filename,
            ]);

            $uploadedImages[] = $uploadedImage;
        }

        return response()->json([
            'success' => true,
            'images' => $uploadedImages,
        ]);
    }


    /**
     * Display the project form.
     */
    public function project(): Response
    {
        return Inertia::render('Admin/Projects/ProjectEdit');
    }

    /**
     * Display the project list.
     */
    public function projectList()
    {
        $projects = Project::all();

        $projects->each(function ($project) {

            $project->load('images');

            $project->details = json_decode($project->details, true);
            // dd($project);
        });

        return $projects;
    }

    /**
     * Create the project information.
     */
    public function storeProject(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255', 
            'location' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'date' => 'required|date',
            'images' => 'nullable|array', 
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $project = Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'location' => $request->location,
            'client' => $request->client,
            'date' => $request->date,
        ]);
    
        if ($request->hasFile('images')) {
            $index = 1;
            foreach ($request->file('images') as $file) {
                $filename = 'project' . $index;
                $destinationPath = public_path('assets/img/projects/' . 'project' . $project->id);
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
                $file->move($destinationPath, $filename);
                $project->images()->create([
                    'image_path' => 'assets/img/projects/project' . $project->id . '/' . $filename,
                ]);
                $index = $index + 1;
            }
        }
        
        return redirect(route('admin.project'));
    }

    /**
     * Delete the project information.
     */
    public function destroyProject($id)
    {
        $project = Project::find($id);

        $project->delete();

        return redirect()->back();
    }

    /**
     * Update the project information.
     */
    public function updateProject(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => '|string|max:255',
            'description' => '|string',
            'category' => '|string|max:255',
            'location' => '|string|max:255',
            'client' => '|string|max:255',
            'date' => '|date',
        ]);

        $project = Project::findOrFail($id);

        $project->update($validatedData);

        return redirect()->back();
    }

    /**
     * Upload the project image.
     */
    public function uploadProjectImage(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $projectId = $request->input('project_id');
        $uploadedImages = [];
        foreach ($request->file('images') as $image) {
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = $image->storeAs('assets/img/projects/' . 'project' . $projectId);
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
                $image->move($destinationPath, $filename);

            $uploadedImage = ProjectImage::create([
                'project_id' => $projectId,
                'image_path' => $destinationPath . '/'. $filename,
            ]);

            $uploadedImages[] = $uploadedImage;
        }

        return response()->json([
            'success' => true,
            'images' => $uploadedImages,
        ]);
    }


    /**
     * Delete the project image.
     */
    public function destroyProjectImage($id)
    {
        $image = ProjectImage::findOrFail($id);

        $image->delete();

        return redirect()->back();
    }



}
