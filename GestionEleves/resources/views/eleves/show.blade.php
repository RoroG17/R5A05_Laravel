@extends('template')
@section('content')
<div>
    <h1>{{ $eleve->nom }} {{ $eleve->prenom }}</h1> <img src="{{ asset('storage/' . $eleve->image) }}" alt="Image de {{ $eleve->nom }}" width="150">
    <p>Numéro étudiant : {{ $eleve->numero_etudiant }}</p>
    <p>Date de naissance : {{ $eleve->date_naissance }}</p>
    <p>Email : {{ $eleve->email }}</p>
    <p>Image : {{ $eleve->image }}</p>

    <h1>Notes : </h1>
    <table>
        <thead>
        <td>Date</td>
        <td>Module</td>
        <td>Evaluation</td>
        <td>Note</td>
        </thead>
        <tbody>
        @foreach($notes as $note)
        <tr>
            <td>{{ $note->date_evaluation }}</td>
            <td>{{ $note->code }} - {{ $note->nom }}</td>
            <td>{{ $note->titre }}</td>
            <td>{{ $note->note }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <p>Moyenne de l'élève : {{ $moyenne }}</p>
</div>
@endsection