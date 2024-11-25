<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;
use App\Models\Module;
use App\Models\EvaluationEleve;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // !!!!! Coeff dans modules et evaluations
        $evaluations = Evaluation::join('modules','evaluations.module', '=', 'modules.code')->select('evaluations.*', 'modules.code', 'modules.nom')->get();
        return view('/evaluations/index', compact('evaluations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modules = Module::all();
        return view('/evaluations/create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $test = Evaluation::create($request->all());
        return redirect()->route('evaluations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $evaluation = Evaluation::where('evaluations.id', $id)->join('modules','evaluations.module', '=', 'modules.code')->select('evaluations.*', 'modules.code', 'modules.nom')->firstOrFail();
        $notes = EvaluationEleve::join('eleves', 'evaluation_eleves.eleve', '=', 'eleves.id')
            ->where('evaluation_eleves.evaluation', '=', $id)
            ->get();

        $notesNuls = EvaluationEleve::join('eleves', 'evaluation_eleves.eleve', '=', 'eleves.id')
            ->where('evaluation_eleves.evaluation', '=', $id)
            ->where('evaluation_eleves.note', '<', 10)
            ->get();
        return view('/evaluations/show', compact('evaluation', 'notes', 'notesNuls'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $modules = Module::all();
        $evaluation = Evaluation::where('evaluations.id', $id)->join('modules','evaluations.module', '=', 'modules.code')->select('evaluations.*', 'modules.code', 'modules.nom')->firstOrFail();
        return view('/evaluations/edit', compact('evaluation', 'modules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $evaluation = Evaluation::findOrFail($id);

        $coefficient = floatval($request->input('coefficient'));
        $evaluation->coefficient = $coefficient;
        $evaluation->update($request->except('coefficient'));

        return redirect()->route('evaluations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $evaluation->delete();

        return redirect()->route('evaluations.index');
    }
}
