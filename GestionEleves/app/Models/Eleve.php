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
}
