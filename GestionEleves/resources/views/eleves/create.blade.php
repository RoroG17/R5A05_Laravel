@extends('template')
@section('content')
<div>
    <form action="{{ route('eleves.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Nom :</label><input type="text" name="nom" required>
        <label>Prénom :</label><input type="text" name="prenom" required>
        <label>Date de Naissance :</label><input type="date" name="date_naissance" required>
        <label>Numéro étudiant :</label><input type="text" name="numero_etudiant" required>
        <label>Email :</label><input type="email" name="email" required>
        <label>Image :</label><input type="file" name="image">
        <button type="submit">Ajouter</button>
    </form>
</div>
@endsection