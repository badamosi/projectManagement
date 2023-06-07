<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    public function index()
    {
        
        try {
            $projects = Project::with('developers')->get();
            return response()->success(['projects' => $projects]);
        } catch (Exception $e) {
            return response()->error($e->getMessage(), 500);
        }
    }

    public function store(CreateProjectRequest $request)
    {
        try {
            $project = Project::create($request->validated());
            return response()->success(['project' => $project]);
        } catch (Exception $e) {
            return response()->error($e->getMessage(), 500);
        }

    }

    public function show(Project $project)
    {
        try {
            // $project = Project::findOrFail($id);
            return response()->success(['project' => $project]);
        } catch (Exception $e) {
            return response()->error($e->getMessage(), 500);
        }

    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        try {
            // $project = Project::findOrFail($id);
            $project->update($request->validated());
            return response()->success(['project' => $project]);
        } catch (Exception $e) {
            return response()->error($e->getMessage(), 500);
        }
    }

    public function destroy(Project $project)
    {
        
        try {
            // $project = Project::findOrFail($id);
            $project->delete();
            return response()->success(['message' => 'Project deleted successfully']);
        } catch (Exception $e) {
            return response()->error($e->getMessage(), 500);
        }
    }


    public function assignProject(Request $request)
    {
        
        try {
            $developerIds = $request->input('developer_ids', []);
            $project = Project::findOrFail($id);
    
            // Validate the project data and developer IDs
    
            // Assign the project to developers
            $project->developers()->attach($developerIds);
            return response()->success(['message' => 'Project assigned successfully']);
        } catch (Exception $e) {
            return response()->error($e->getMessage(), 500);
        }
    }
}
