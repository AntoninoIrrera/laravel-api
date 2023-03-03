<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {

        $projects = Project::with('type', 'technologies')->paginate(12);

        return response()->json([
            'succes' => true,
            'results' => $projects
        ]);
    }

    public function show(Project $project){

        $project = Project::with('type', 'technologies')->findOrFail($project->id);

        return response()->json([
            'succes' => true,
            'results' => $project
        ]);


    }
}
