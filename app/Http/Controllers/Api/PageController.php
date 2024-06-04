<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class PageController extends Controller
{
    public function index()
    {
        $projects = Project::with('type', 'technologies')->paginate(15);
        return response()->json($projects);
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
