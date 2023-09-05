<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('updated_at', 'DESC')->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        return view('admin.projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validation($request->all());

        $project = new Project();

        $project->fill($data);

        $project->slug = Str::slug($project->title, '-');

        $project->save();

        return to_route('admin.projects.show', $project)->with('alert-type', 'success')->with('alert-message', "Progetto inserito con successo!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
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
        $data = $this->validation($request->all(), $project->id);
        $data['slug'] = Str::slug($data['title'], '-');
        $project->update($data);

        return to_route('admin.projects.show', $project)->with('alert-message', 'Progetto modificato con successo!')->with('alert-type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return to_route('admin.projects.index')->with('alert-type', 'success')->with('alert-message', "Progetto eliminato con successo!");
    }

    public function validation($data, $id = null)
    {
        $rules = [
            'title' => ['required', 'string', 'max:100'],
            'description' => 'required|string',
            'thumb' => 'nullable|url',
            'category' => 'required|string',
            'status' => 'required|string'
        ];

        if ($id) $rules['title'][] = Rule::unique('projects')->ignore($id);

        else $rules['title'][] = 'unique:projects';

        $messages = [
            'title.required' => 'Attenzione! Il titolo è obbligatorio',
            'title.max' => 'Attenzione! Il titolo deve essere lungo massimo :max caratteri',
            'title.unique' => 'Attenzione! Questo titolo esiste già',

            'description.required' => 'Attenzione! La descrizione è obbligatoria',

            'thumb.url' => "L'url inserito non è valido",

            'status.required' => "Attenzione! Lo stato è obbligatorio",

            'category.required' => "Attenzione! Almeno un linguaggio è obbligatorio"
        ];

        $validated_fields = Validator::make($data, $rules, $messages)->validate();

        return $validated_fields;
    }
}
