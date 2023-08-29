<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project :: paginate(15);
        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies = Technology::all();
        return view('admin.projects.create',compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $img_path = Storage::put('uploads',$request['image']);

        $data = $request->validate([
            'title'=> ['required','unique:projects','max:255'],
            'image'=> ['required'],
            'description'=>['required','max:500'],
            'attachments'=> ['required','max:30'],
            'technologies'=>['exists:technologies,id']
        ]);

        $data['image']=$img_path;

        $newProject = Project::create($data);

        if($request->has('technologies')){
            $newProject->technologies()->sync($request->technologies);
        }

        return redirect()->route('admin.projects.index',compact('newProject'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = Project::find($id);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $img_path = Storage::put('uploads',$request['image']);

        $data = $request->validate([
            'title'=>['required','min:3','max:255',Rule::unique('projects')->ignore($project->id)],
            'image'=>['required'],
            'description'=>['max:255'],
            'attachments' =>['required','max:30']
        ]);

        Storage::delete($project->image);

        $data['image']=$img_path;

        $project->update($data);

        return redirect()->route('admin.projects.show',compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        Storage::delete($project->image);
        $project->delete();

        return redirect()->route('admin.projects.index'); 
    }
}
