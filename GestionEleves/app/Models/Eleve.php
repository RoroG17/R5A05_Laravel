<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'numero_etudiant',
        'email',
        'image'
    ];

    public static function getMoyenne($notes){
        $total = 0;
        $coeff = 0;
        foreach ($notes as $note) {
            if ($note instanceof EvaluationEleve) { 
                $total += $note->note;
                $coeff += 1;
            }
        }

        if ($coeff == 0){
            return "Il n'y a pas de notes pour le moment";
        }
        return $total/$coeff;

    }
}
