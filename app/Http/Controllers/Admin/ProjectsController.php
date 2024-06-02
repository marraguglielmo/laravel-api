<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use App\Functions\Helper as Help;


class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies = Technology::all();
        $types = Type::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form_data = $request->all();


        $form_data['slug'] = Help::generateSlug($form_data['title'], Project::class);

        $new_project = new Project();
        $new_project->fill($form_data);
        $new_project->save();

        // l'associazione m,many to many deve avvenire dopo il salvataggio del dato nel db

        // controllo sulle technologies
        if (array_key_exists('technologies', $form_data)) {
            $new_project->technologies()->attach($form_data['technologies']);
        }


        return redirect()->route('admin.projects.index', $new_project)->with('success', 'Il progetto è stato inserito correttamente');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate(
            [
                'title' => 'required|min:5|max:30'
            ],
            [
                'title.required' => 'Devi inserire il nome del progetto',
                'title.min' => 'Il progetto deve avere almeno :min caratteri',
                'title.max' => 'Il progetto non  deve avere più di :max caratteri',
            ]
        );
        $exists = Project::where('title', $request->title)->first();
        if ($exists) {
            return redirect()->route('admin.projects.index')->with('error', 'Nessuna modifica effettuata');
            // dd($exists);
        } else {
            $data['slug'] = Help::generateSlug($request->title, project::class);
            $project->update($data);

            return redirect()->route('admin.projects.index')->with('success', 'Progetto modificato');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Il progetto è stato eliminato');
    }
}
