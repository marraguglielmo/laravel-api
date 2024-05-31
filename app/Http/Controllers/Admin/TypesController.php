<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Functions\Helper as Help;


class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    public function typeProjects()
    {
        $types = Type::all();
        return view('admin.types.type-projects', compact('types'));
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
        $exist = Type::where('title', $request->title)->first();

        if ($exist) {
            return redirect()->route('admin.types.index')->with('error', 'Il linguaggio è già stato inserito');
        } else {
            $new_type = new type();
            $new_type->title = $request->title;
            $new_type->slug = Help::generateSlug($new_type->title, type::class);
            $new_type->save();
            return redirect()->route('admin.types.index')->with('success', 'Il linguaggio è stato inserito correttamente');
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
    public function update(Request $request, Type $type)
    {
        $data = $request->validate(
            [
                'title' => 'required|min:2|max:30'
            ],
            [
                'title.required' => 'Devi inserire il nome del linguaggio',
                'title.min' => 'Il tipo deve avere almeno :min caratteri',
                'title.max' => 'Il tipo non  deve avere più di :max caratteri',
            ]
        );
        $exists = Type::where('title', $request->title)->first();
        if ($exists) {
            return redirect()->route('admin.types.index')->with('error', 'Nessuna modifica effettuata');
            // dd($exists);
        } else {
            $data['slug'] = Help::generateSlug($request->title, type::class);
            $type->update($data);

            return redirect()->route('admin.types.index')->with('success', 'Linguaggio modificato');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index')->with('success', 'Il tipo è stato eliminato correttamente');
    }
}
