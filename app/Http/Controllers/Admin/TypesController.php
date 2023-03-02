<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TypesController extends Controller
{

    protected $regoleValidazione = [
        'name' => 'required|unique:types|max:150',
        'color' => 'required|max:10',
        'image' => 'URL',
    ];
    protected $messaggiValidazione = [
        'name.required' => 'il campo è obbligatorio.',
        'name.unique' => 'il campo con questa voce esiste già.',
        'name.max' => 'il campo non può contenere più di 150 caratteri.',
        'color.required' => 'il campo è obbligatorio.',
        'color.max' => 'il campo non può contenere più di 10 caratteri.',
        'image.URL' => 'inserire un URL valido e attivo.',
        'image.required' => 'il campo è obbligatorio.',
        
    ];




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $types = Type::paginate(10);

        return view('admin.type.index', compact('types'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $type = new Type();

        return view('admin.type.create', compact('type'));

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

        $newType = new Type();
        $newType->fill($data);
        $newType->save();

        return redirect()->route('admin.type.show',$newType->id)->with('message', "l'elemento è stato creato correttamente");

    }   

    /**
     * Display the specified resource.
     *
     * @param   Type $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.type.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $regoleDaAggiornare = $this->regoleValidazione;

        $regoleDaAggiornare['name'] = ['required', Rule::unique('types')->ignore($type->id), 'max:150'];

        $data = $request->validate($regoleDaAggiornare, $this->messaggiValidazione);


       


        $type->update($data);

        return redirect()->route('admin.type.show', $type->id)->with('message', "l'elemento è stato modificato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('admin.type.index')->with('message', "l'elemento è stato eliminato correttamente");
    }
}
