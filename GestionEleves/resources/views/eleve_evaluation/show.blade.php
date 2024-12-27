@extends('template')
@section('content')
<div>
    @if ($eleveEvaluation)
        <h2>Évaluation de l'étudiant</h2>
        <p><strong>Numéro étudiant :</strong> {{ $eleveEvaluation->numero_etudiant }}</p>
        <p><strong>Nom :</strong> {{ $eleveEvaluation->nom }}</p>
        <p><strong>Prénom :</strong> {{ $eleveEvaluation->prenom }}</p>
        <p><strong>Code module :</strong> {{ $eleveEvaluation->module }}</p>
        <p><strong>Titre :</strong> {{ $eleveEvaluation->titre }}</p>
        <p><strong>Date de l'évaluation :</strong> {{ $eleveEvaluation->date_evaluation }}</p>
        <p><strong>Coefficient :</strong> {{ $eleveEvaluation->coefficient }}</p>
        <p><strong>Note :</strong> {{ $eleveEvaluation->note }} / 20</p>
    @else
        <p>Aucune évaluation trouvée pour cet étudiant.</p>
    @endif
</div>
@endsection
