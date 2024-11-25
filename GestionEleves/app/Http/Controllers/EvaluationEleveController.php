<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EvaluationEleve;
use App\Models\Eleve;
use App\Models\Evaluation;
use Illuminate\Support\Facades\DB;

class EvaluationEleveController extends Controller
{
    // Affiche la liste de toutes les évaluations des élèves
    public function index()
    {
        $eleveEvaluations = EvaluationEleve::join('eleves', 'evaluation_eleves.eleve', '=', 'eleves.id')
                                            ->join('evaluations', 'evaluation_eleves.evaluation', '=', 'evaluations.id')
                                            ->join('modules', 'evaluations.module', '=', 'modules.code')
                                            ->select('eleves.numero_etudiant', 'eleves.nom', 'eleves.prenom', 'modules.code', 'evaluations.*', 'evaluation_eleves.note')
                                            ->get();
        return view('eleve_evaluation.index', compact('eleveEvaluations'));
    }

    // Affiche le formulaire pour créer une nouvelle évaluation d'élève
    public function create()
    {
        $eleves = Eleve::all();
        $evaluations = Evaluation::join('modules', 'evaluations.module', '=', "modules.code")->get();
        return view('eleve_evaluation.create', compact('eleves', 'evaluations'));
    }

    // Enregistre une nouvelle évaluation d'élève
    public function store(Request $request)
    {
        EvaluationEleve::create($request->all());

        return redirect()->route('evaluation_eleve.index');
    }

    // Affiche une évaluation spécifique d'un élève
    public function show($id)
    {
        $eleveEvaluation = EvaluationEleve::firstOrFail($id);
        return view('eleve_evaluation.show', compact('eleveEvaluation'));
    }

    // Affiche le formulaire pour modifier une évaluation d'élève
    public function edit($id)
    {
        $eleves = Eleve::all();
        $evaluations = Evaluation::join('modules', 'evaluations.module', '=', "modules.code")->get();

        $eleveEvaluation = EvaluationEleve::join('evaluations', 'evaluations.id', '=', 'evaluation_eleves.evaluation')
                                            ->join('eleves', 'eleves.id', '=', 'evaluation_eleves.eleve')
                                            ->where('evaluation_eleves.id', $id)
                                            ->firstOrFail();

        return view('eleve_evaluation.edit', compact('eleveEvaluation', 'eleves', 'evaluations'));
    }

    // Met à jour une évaluation d'élève
    public function update(Request $request, $id)
    {
        $update = DB::table('evaluation_eleves')
            ->where('id', $id)
            ->update([
                'eleve' => $request->input('eleve'),
                'evaluation' => $request->input('evaluation'),
                'note' => $request->input('note')
            ]);


        return redirect()->route('evaluation_eleve.index');
    }

    // Supprime une évaluation d'élève
    public function destroy($id)
    {
        $eleveEvaluation = EvaluationEleve::firstOrFail($id);
        dd($eleveEvaluation);
        $eleveEvaluation->delete();

        return redirect()->route('evaluation_eleve.index');
    }
}
