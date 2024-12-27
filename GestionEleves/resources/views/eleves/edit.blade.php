@extends('template')
@section('content')
<div>
    <form action="{{ route('eleves.update', $eleve->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nom :</label><input type="text" name="nom" value="{{ $eleve->nom }}" required>
        <label>Prénom :</label><input type="text" name="prenom" value="{{ $eleve->prenom }}" required>
        <label>Date de Naissance :</label><input type="date" name="date_naissance" value="{{ $eleve->date_naissance }}" required>
        <label>Numéro étudiant :</label><input type="text" name="numero_etudiant" value="{{ $eleve->numero_etudiant }}" required>
        <label>Email :</label><input type="email" name="email" value="{{ $eleve->email }}" required>
        <button type="submit">Mettre à jour</button>
    </form>
</div>
@endsection