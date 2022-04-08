<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Project;
use DataTables;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::All();
        return view('projects', ['projects'=>$projects]);
    }

    public function destroy($id)
    {
        $project = Project::where('id', $id)->delete();
        echo ("Project Record deleted successfully.");
        return redirect()->route('projects.index');
    }

    public function edit($id)
    {
        $project = Project::find($id);
        return view('edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $project->projectTitle = $request->input('projectTitle');
        $project->projectOrganisation = $request->input('projectOrganisation');
        $project->projectLocation = $request->input('projectLocation');
        $project->projectDetails = $request->input('projectDetails');
        $project->sdg = $request->input('sdg');
        $project->update();
        return redirect()->back()->with('status','Updated Successfully');
    }

    /*
    public function index()
    {
        $projects = Project::all();
        return view('user.projects', compact('projects'));
    }

    public function create()
    {
        return view('user.projects-create');
    }

    public function store(Request $request)
    {
        $project = $request->all();
        $project['uuid'] = (string)Uuid::generate();
        if ($request->hasFile('cover')) {
            $project['cover'] = $request->cover->getClientOriginalName();
            $request->cover->storeAs('projects', $project['cover']);
        }
        Project::create($project);
        return redirect()->route('user.projects');
    }

    public function download($uuid)
    {
        $project = Project::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/projects/' . $project->cover);
        return response()->download($pathToFile);
    }
    */
}
