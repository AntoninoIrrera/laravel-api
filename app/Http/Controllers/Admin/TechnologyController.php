<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TechnologyController extends Controller
{
    protected $regoleValidazione = [
        'name' => 'required|unique:types|max:150',
        'color' => 'required|max:50',
        'image' => 'required|URL',
        'versione' => 'required|max:10'
    ];
    protected $messaggiValidazione = [
        'name.required' => 'il campo è obbligatorio.',
        'name.unique' => 'il campo con questa voce esiste già.',
        'name.max' => 'il campo non può contenere più di 150 caratteri.',
        'color.required' => 'il campo è obbligatorio.',
        'color.max' => 'il campo non può contenere più di 50 caratteri.',
        'image.required' => 'il campo è obbligatorio.',
        'image.URL' => 'inserire un URL valido e attivo.',
        'versione.required' => 'il campo è obbligatorio.',
        'versione.max' => 'il campo non può contenere più di 10 caratteri.',

    ];




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $technologies = Technology::paginate(10);

        return view("admin.Technology.index",compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $technology = new Technology();

        return view('admin.technology.create',compact('technology'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->regoleValidazione, $this->messaggiValidazione);

        $newTechnology = new Technology();
        $newTechnology->fill($data);
        $newTechnology->save();

        return redirect()->route('admin.technology.show', $newTechnology->id)->with('message', "l'elemento è stato creato correttamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  Technology $technology
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        
        return view('admin.technology.show',compact('technology'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Technology $technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
        return view('admin.technology.edit',compact('technology'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Technology $technology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        $regoleDaAggiornare = $this->regoleValidazione;

        $regoleDaAggiornare['name'] = ['required', Rule::unique('types')->ignore($technology->id), 'max:150'];

        $data = $request->validate($regoleDaAggiornare, $this->messaggiValidazione);


        $technology->update($data);

        return redirect()->route('admin.technology.show', $technology->id)->with('message', "l'elemento è stato modificato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Technology $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return redirect()->route('admin.technology.index')->with('message', "l'elemento è stato eliminato correttamente");

    }
}
