<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationEleve extends Model
{
    use HasFactory;

    protected $fillable = [
        'eleve',
        'evaluation',
        'note',
    ];

    public function getMailEleve(){
        $mail = $this::join('eleves', 'evaluation_eleves.eleve', '=', 'eleves.id')
                                ->select('eleves.email')
                                ->get();

        return $mail;
    }

    public function getInformationNote(){
        $information = $this::join('eleves', 'evaluation_eleves.eleve', '=', 'eleves.id')
                            ->join('evaluations', 'evaluation_eleves.evaluation', '=', 'evaluations.id')
                            ->join('modules', 'evaluations.module', '=', 'modules.code')
                            ->select('eleves.nom', 'eleves.prenom', 'modules.nom as module', 'evaluations.date_evaluation', 'evaluations.titre', 'evaluation_eleves.note')
                            ->get();
        return $information;
    }
}
