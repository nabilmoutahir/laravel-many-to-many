<?php

namespace App\Http\Controllers\Admin;
// utile
use App\Http\Controllers\Controller;

// use\Http\Requests\StorePostRequest;
// use \Http\Requests\UpdatePostRequest;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'DESC')->paginate(20);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = new Project;

        $technologies = Technology::all();

        $types = Type::all();

        return view('admin.projects.create', compact('types', 'technologies', 'project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validated();

        $data = $request->all();

        

        // NEW PROJECT
        $project = new Project;

        // FILL DATA
        $project->fill($data);

        // FILL SLUG
        $project->slug = Str::slug($project->title);

        if (Arr::exists($data, 'image')){
        // STORE IMAGE
        $image_path = Storage::put('uploads/projects', $data['image']);

        // ADD IMAGE
        $project->image = $image_path;
        }
        
        // SAVE PROJECT
        $project->save();

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $technologies = Technology::all();

        $types = Type::all();

        return view('admin.projects.edit', compact('types', 'project', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {

        // validation

        $data = $request->all();

        // FILL DATA
        $project->fill($data);

        // FILL SLUG
        $project->slug = Str::slug($project->title);

        // SAVE
        $project->save();

        // IMAGE
        if (Arr::exists($data, 'image')){

            if(!empty($project->image)){
                Storage::delete($project->image);
            }

            // STORE IMAGE
            $image_path = Storage::put('uploads/projects', $data['image']);

            // ADD IMAGE
            $project->image = $image_path;
        }

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        // AUTH CONDITION
        // if (Auth::id() != $project->user_id && Auth::user()->role != 'admin')
        //     abort(403);


        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
