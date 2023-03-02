<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;  
use App\Models\Type;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){

        
        $projects = Project::paginate(5);
        $types = Type::all();
        $technologies = Technology::all();

        return view('guest.index', compact('projects','types', 'technologies'));


    }

    public function show(Project $project){

        $types = Type::all();
        $technologies = Technology::all();

        return view('guest.show', compact('project','types', 'technologies'));

    }


    public function type(Type $type, Project $project)
    {


        // $filterProjects = Project::where('type_id',$type->id)->get();

        // $types = Type::all();

        
        return view('guest.type', compact('type','project'));
    }

    public function technology(Technology $technology, Project $project)
    {


        // $filterProjects = Project::where('type_id',$type->id)->get();

        // $types = Type::all();


        return view('guest.technology', compact('technology','project'));
    }
    

}
