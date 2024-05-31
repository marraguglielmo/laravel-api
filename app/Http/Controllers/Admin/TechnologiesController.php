<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;
use App\Functions\Helper as Help;

class TechnologiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();

        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exist = Technology::where('title', $request->title)->first();

        if ($exist) {
            return redirect()->route('admin.technologies.index')->with('error', 'Il linguaggio è già stato inserito');
        } else {
            $new_technology = new Technology();
            $new_technology->title = $request->title;
            $new_technology->slug = Help::generateSlug($new_technology->title, Technology::class);
            $new_technology->save();
            return redirect()->route('admin.technologies.index')->with('success', 'Il linguaggio è stato inserito correttamente');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, Technology $technology)
    {

        $data = $request->validate(
            [
                'title' => 'required|min:2|max:15'
            ],
            [
                'title.required' => 'Devi inserire il nome del linguaggio',
                'title.min' => 'Il linguaggio deve avere almeno :min caratteri',
                'title.max' => 'Il linguaggio non  deve avere più di :max caratteri',
            ]
        );
        $exists = Technology::where('title', $request->title)->first();
        if ($exists) {
            return redirect()->route('admin.technologies.index')->with('error', 'Nessuna modifica effettuata');
            // dd($exists);
        } else {
            $data['slug'] = Help::generateSlug($request->title, Technology::class);
            $technology->update($data);

            return redirect()->route('admin.technologies.index')->with('success', 'Linguaggio modificato');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index');
    }
}
