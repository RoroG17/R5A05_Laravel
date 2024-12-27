@extends('template')
@section('content')
<div>
    <form action="{{ route('evaluation_eleve.store') }}" method="POST">
        @csrf
        <label>Elève :</label>
        <select name="eleve" id="eleve" required>
            <option value="" disabled selected>Choisissez un élève</option>
            @foreach($eleves as $eleve)
                <option value="{{ $eleve->id }}">{{ $eleve->nom }} - {{ $eleve->prenom }}</option>
            @endforeach
        </select>

        <label>Evaluation :</label>
        <select name="evaluation" id="evaluation" required>
            <option value="" disabled selected>Choisissez un module</option>
            @foreach($evaluations as $eval)
                <option value="{{ $eval->id }}">{{ $eval->nom }} - {{ $eval->titre }}</option>
            @endforeach
        </select>
        <label>Note :</label><input type="float" name="note" required>
        <button type="submit">Ajouter</button>
    </form>
</div>
@endsection