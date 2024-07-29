<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data = $request->validate([
            "name"=>['required', 'min:2', 'max:255'],
            "language_used"=>['required', 'min:1', 'max:255'],
            "url_repo"=>['url', 'nullable']
        ],[
            "name"=>'You must enter a valid name!',
            "language_used"=>'You must enter a valid language between 1 and 250 characters!',
            "url_repo"=>'You must enter a valid URL!'
        ]);

        $newProject = new Project($data);
        $newProject->save();

        return redirect()->route('admin.project.show', $newProject)->with('new_project_message', $newProject->name . " It was created successfully!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
