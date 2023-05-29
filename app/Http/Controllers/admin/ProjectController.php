<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(Request $request)
    {   
        
        $this->validation($request);

        
        $formData = $request->all();
        $newProject = new Project();
        $newProject->title = $formData['title'];
        $newProject->description = $formData['description'];
        $newProject->slug = Str::slug($newProject->title, '-');
        $newProject->link = $formData['link'];
        $newProject->type_id = $formData['type_id'];
        
        if($request->hasFile('cover_image')){
            $path = Storage::put('projects_images', $request->cover_image);
            $formData['cover_image'] = $path;
            $newProject->cover_image = $formData['cover_image'];
        }


        

        $newProject->save();

        if(array_key_exists('technologies', $formData)){
            $newProject->technologies()->attach($formData['technologies']);
        }
        return redirect()->route('admin.projects.show', $newProject->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $technologies = Technology::all();
        return view('admin.projects.show', compact('project', 'technologies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validation($request);

        $formData =$request->all();
        
        if($request->hasFile('cover_image')){
            if($project->cover_image){
                Storage::delete($project->cover_image);
            }
            $path = Storage::put('projects_images', $request->cover_image);
            $formData['cover_image'] = $path;
            
        }

        $project->update($formData);
        
        $project->save();

        if(array_key_exists('technologies', $formData)){
            $project->technologies()->sync($formData['technologies']);
        }else{
            $project->technologies()->detach();
        }


        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {   
        if($project->cover_image){
            Storage::delete($project->cover_image);
        }
        $project->delete();
        return redirect()->route('admin.projects.index');
    }

    private function validation($request){
        $request->validate([
            'title' => 'required|min:5',
            'description'=> 'required',
            'link'=>'required',
            'cover_image' => 'nullable|image|max:2048',
            
        ]);
    }
}
