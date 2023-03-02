<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    protected $regoleValidazione = [
            'title' => 'required|unique:projects|max:50',
            'relase_date' => 'required|date',
            'image' => 'max:300|image',
            'description' => '',
            'type_id' => 'required|exists:types,id',
            'technologies' => 'required|exists:technologies,id|array'
        ];
    protected $messaggiValidazione = [
            'title.required' => 'il campo è obbligatorio.',
            'title.unique' => 'il campo con questa voce esiste già.',
            'title.max' => 'il campo non può contenere più di 50 caratteri.',
            'relase_date.required' => 'il campo è obbligatorio.',
            'relase_date.date' => 'il campo deve contenere una data valida.',
            'image.image' => 'inserire un immagine valida.',
            'image.max' => "l'immagine inserita e troppo grande, deve pesare massimo 300kb.",
            'type_id.required' => 'il campo è obbligatorio.',
            'type_id.exists' => 'il campo selezionato non esiste.',
            'technologies.required' => 'il campo è obbligatorio.',
            'technologies.exists' => 'il campo selezionato non esiste.'
        ];



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projects = Project::paginate(10);

        return view('admin.project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = new Project();
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.project.create', compact('project', 'types','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->regoleValidazione,$this->messaggiValidazione);
       

        if (isset($data['image'])) {
            $data['image'] = Storage::put('img',$data['image']);
        }
        
        $newProject = new Project();
        $newProject->fill($data);
        $newProject->save();
        $newProject->technologies()->sync($data['technologies']);

        return redirect()->route('admin.project.show',$newProject->id)->with('message',"l'elemento è stato creato correttamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {

        // $project = Project::findOrFail($id);

        return view('admin.project.show',compact('project'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        // $project = Project::findOrFail($id);
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.project.edit', compact('project','types',"technologies"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {

      

        // $project = Project::findOrFail($id);

        $regoleDaAggiornare = $this->regoleValidazione;

        $regoleDaAggiornare['title'] = ['required',Rule::unique('projects')->ignore($project->id),'max:50'];
        
        $data = $request->validate($regoleDaAggiornare,$this->messaggiValidazione);


        if(isset($data['image'])){
            if(isset($project->image)){
                Storage::delete('img', $project->image);
            }
            $data['image'] = Storage::put('img', $data['image']);
        }


        $project->update($data);
        $project->technologies()->sync($data['technologies']);

        return redirect()->route('admin.project.show', $project->id)->with('message', "l'elemento è stato modificato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        // $project = Project::findOrFail($id);

        // $project->technologies()->sync([]);
        $project->delete();

        if (isset($project->image)) {
            Storage::delete('img', $project->image);
        }

        return redirect()->route('admin.project.index')->with('message', "l'elemento è stato eliminato correttamente");

    }
}
