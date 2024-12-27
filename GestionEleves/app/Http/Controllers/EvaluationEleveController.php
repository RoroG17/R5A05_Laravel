<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EvaluationEleve;
use App\Models\Eleve;
use App\Models\Evaluation;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class EvaluationEleveController extends Controller
{
    // Affiche la liste de toutes les évaluations des élèves
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 2 ){
            return redirect()->route('eleves.index');
        }
        
        $eleveEvaluations = EvaluationEleve::join('eleves', 'evaluation_eleves.eleve', '=', 'eleves.id')
                                            ->join('evaluations', 'evaluation_eleves.evaluation', '=', 'evaluations.id')
                                            ->join('modules', 'evaluations.module', '=', 'modules.code')
                                            ->select('eleves.numero_etudiant', 'eleves.nom', 'eleves.prenom', 'modules.code', 'evaluations.*', 'evaluation_eleves.note', 'evaluation_eleves.id')
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
        $eleveEvaluation = EvaluationEleve::join('eleves', 'evaluation_eleves.eleve', '=', 'eleves.id')
                                            ->join('evaluations', 'evaluation_eleves.evaluation', '=', 'evaluations.id')
                                            ->join('modules', 'evaluations.module', '=', 'modules.code')
                                            ->where('evaluation_eleves.id', '=', $id)
                                            ->select('eleves.numero_etudiant', 'eleves.nom', 'eleves.prenom', 'modules.code', 'evaluations.*', 'evaluation_eleves.note')
                                            ->first();

        return view('eleve_evaluation.show', compact('eleveEvaluation'));
    }

    // Affiche le formulaire pour modifier une évaluation d'élève
    public function edit($id)
    {
        // Récupération de tous les élèves et évaluations
        $eleves = Eleve::all();
        $evaluations = Evaluation::join('modules', 'evaluations.module', '=', 'modules.code')->get();

        // Récupération de l'enregistrement spécifique dans la table evaluation_eleves
        $eleveEvaluation = EvaluationEleve::join('evaluations', 'evaluations.id', '=', 'evaluation_eleves.evaluation')
                                            ->join('eleves', 'eleves.id', '=', 'evaluation_eleves.eleve')
                                            ->where('evaluation_eleves.id', $id)
                                            ->select(
                                                'evaluation_eleves.id AS id', 
                                                'eleves.numero_etudiant',
                                                'eleves.nom',
                                                'eleves.prenom',
                                                'evaluations.id AS evaluation_id', // Ajout explicite de l'ID evaluation
                                                'evaluations.module',
                                                'evaluations.titre',
                                                'evaluations.coefficient',
                                                'evaluation_eleves.note'
                                            )
                                            ->firstOrFail();

        return view('eleve_evaluation.edit', compact('eleveEvaluation', 'eleves', 'evaluations'));
    }


    // Met à jour une évaluation d'élève
    public function update(Request $request, $id)
    {
        $evaluationEleve = EvaluationEleve::where('evaluation_eleves.id', $id)->first();
        $evaluationEleve->note = $request->input('note');
        $evaluationEleve->save();

        return redirect()->route('evaluation_eleve.index');
    }

    // Supprime une évaluation d'élève
    public function destroy($id)
    {
        $eleveEvaluation = EvaluationEleve::where('evaluation_eleves.id', $id);
        $eleveEvaluation->delete();

        return redirect()->route('evaluation_eleve.index');
    }
}
