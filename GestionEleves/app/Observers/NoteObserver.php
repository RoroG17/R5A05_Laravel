<?php

namespace App\Observers;

use App\Models\EvaluationEleve;
use App\Mail\NoteAjoute;

use Illuminate\Support\Facades\Mail;


class NoteObserver
{
    /**
     * Handle the EvaluationEleve "created" event.
     */
    public function created(EvaluationEleve $evaluationEleve): void
    {
        $informationNote = $evaluationEleve->getInformationNote()->first();

        if ($informationNote) {
            Mail::to($evaluationEleve->getMailEleve())->send(
                new NoteAjoute(
                    $informationNote->note,
                    $informationNote->date_evaluation,
                    $informationNote->nom,
                    $informationNote->prenom,
                    $informationNote->module,
                    $informationNote->titre
                )
            );
        }
    }

    /**
     * Handle the EvaluationEleve "updated" event.
     */
    public function updated(EvaluationEleve $evaluationEleve): void
    {
        //
    }

    /**
     * Handle the EvaluationEleve "deleted" event.
     */
    public function deleted(EvaluationEleve $evaluationEleve): void
    {
        //
    }

    /**
     * Handle the EvaluationEleve "restored" event.
     */
    public function restored(EvaluationEleve $evaluationEleve): void
    {
        //
    }

    /**
     * Handle the EvaluationEleve "force deleted" event.
     */
    public function forceDeleted(EvaluationEleve $evaluationEleve): void
    {
        //
    }
}
