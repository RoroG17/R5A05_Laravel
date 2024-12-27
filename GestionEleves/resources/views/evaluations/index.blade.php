@extends('template')
@section('content')
<div>
    <a href="{{ route('evaluations.create') }}">Ajouter une évaluation</a>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Module</th>
                <th>Nom du Module</th>
                <th>Titre</th>
                <th>coefficient</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evaluations as $evaluation)
            <tr>
                <td>{{ $evaluation->date_evaluation }}</td>
                <td>{{ $evaluation->module }}</td>
                <td>{{ $evaluation->nom }}</td>
                <td>{{ $evaluation->titre }}</td>
                <td>{{ $evaluation->coefficient }}</td>
                <td>
                    <a href="{{ route('evaluations.show', $evaluation->id) }}">Voir</a>
                    <a href="{{ route('evaluations.edit', $evaluation->id) }}">Modifier</a>
                    <form action="{{ route('evaluations.destroy', $evaluation->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection