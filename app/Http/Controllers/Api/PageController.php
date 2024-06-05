<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;

class PageController extends Controller
{
    public function index()
    {
        $projects = Project::with('type', 'technologies')->paginate(15);
        return response()->json($projects);
    }


    public function getTechnologies()
    {
        $technologies = Technology::all();
        return response()->json($technologies);
    }

    public function getTypes()
    {
        $types = Type::all();
        return response()->json($types);
    }



    public function getProjectBySlug($slug)
    {
        $project = Project::where('slug', $slug)->with('type', 'technologies')->first();
        if ($project) {
            $success = true;
        } else {
            $success = false;
        }

        return response()->json(compact('success', 'project'));
    }
}
