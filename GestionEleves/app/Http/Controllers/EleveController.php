<?php

namespace App\Http\Controllers;

use App\Models\EvaluationEleve;
use Illuminate\Http\Request;
use App\Models\Eleve;
use Illuminate\Support\Facades\Validator;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $eleves = Eleve::paginate(10);
        return view('eleves/index', compact('eleves'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eleves/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'numero_etudiant' => 'required|string|unique:eleves,numero_etudiant',
            'email' => 'required|email|unique:eleves,email',
            'image' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Eleve::create($request->all());
        return redirect()->route('eleves.index');
    }


    /**
     * Display the specified resource.
     */
    public function show($id) {
        $eleve = Eleve::findOrFail($id);
        $notes = EvaluationEleve::join('evaluations', 'evaluation_eleves.evaluation', '=', 'evaluations.id')
                                ->join('modules', 'evaluations.module', 'modules.code')
                                ->where('evaluation_eleves.eleve', '=', $id)
                                ->get();
        return view('eleves/show', compact('eleve', 'notes'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $eleve = Eleve::findOrFail($id);
        return view('eleves/edit', compact('eleve'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'numero_etudiant' => 'required|string|unique:eleves,numero_etudiant,' . $id,
            'email' => 'required|email|unique:eleves,email,' . $id,
            'image' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $eleve = Eleve::findOrFail($id);
        $eleve->update($request->all());
        return redirect()->route('eleves.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $eleve = Eleve::findOrFail($id);
        $eleve->delete();
        return redirect()->route('eleves.index');
    }

}
