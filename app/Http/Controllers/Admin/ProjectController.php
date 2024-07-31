<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(10);

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
    public function store(StoreProjectRequest $request)
    {
        $data = $request->except('_token');
        $data = $request->validated();
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
    public function edit(Project $project)
    {
        return view('admin.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->except('_token');
        $data = $request->validated();
        $project->update($data);

        return redirect()->route('admin.project.show', $project)->with('update_project_message', $project->name . " It has been successfully updated!!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.project.index')->with('message_delete', $project->name . " it has been successfully deleted!!");
    }

    /**
     * Trash
     */

    public function deletedIndex()
    {
        $projects = Project::onlyTrashed()->get();

        return view('admin.project.delete', compact('projects'));
    }

    /* restore items from the recycle bin */
    public function restore(string $id)
    {
        $projects = Project::onlyTrashed()->findOrFail($id);
        $projects->restore();

        return redirect()->route('admin.project.index')->with('message_restore', $projects->name . " it has been successfully restored!!");
    }

    /* Empty the trash */
    public function delete(string $id)
    {
        $projects = Project::onlyTrashed()->findOrFail($id);
        $projects->forceDelete();
        return redirect()->route('admin.project.deleteindex')->with('message_delete', $projects->name . " The trash has been emptied!!");
    }
}
