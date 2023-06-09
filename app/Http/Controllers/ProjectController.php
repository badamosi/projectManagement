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

            $project->developers()->attach($request->developer_ids);

            return response()->success(['project' => $project]);
        } catch (Exception $e) {
            return response()->error($e->getMessage(), 500);
        }

    }

    public function show(Project $project)
    {
        try {
            return response()->success(['project' => $project]);
        } catch (Exception $e) {
            return response()->error($e->getMessage(), 500);
        }

    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        try {
            $project->developers()->sync($request->developer_ids);
            $project->update($request->validated());


            return response()->success(['project' => $project]);
        } catch (Exception $e) {
            return response()->error($e->getMessage(), 500);
        }
    }

    public function destroy(Project $project)
    {
        
        try {
            $project->delete();
            return response()->success(['message' => 'Project deleted successfully']);
        } catch (Exception $e) {
            return response()->error($e->getMessage(), 500);
        }
    }

}
