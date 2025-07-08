<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with(['user','client'])->paginate(10);
        return view("projects.index",compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select(['id','first_name','last_name'])->get();
        $clients = Client::select(['id','company_name'])->get();

        return view("projects.create",compact(['users','clients']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        Project::create($request->validated());
        return redirect()->route('projects.index')->with('success','project added succefully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
         $users = User::select(['id','first_name','last_name'])->get();
        $clients  = Client::select(['id','company_name'])->get();
         return view("projects.edit",compact(['users','clients','project']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());
        return redirect()->route("projects.index")->with('success','project modified succefully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
         Gate::authorize(\App\PermissionEnum::DELETE_PROJECTS);
        $project->delete();
        return redirect()->route("projects.index")->with('success','project deleted succefully');
    }
}
