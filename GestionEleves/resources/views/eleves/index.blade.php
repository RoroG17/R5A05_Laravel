@extends('template')
@section('content')
<div>
    <a href="{{ route('eleves.create') }}">Ajouter un élève</a>
    
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eleves as $eleve)
            <tr>
                <td>{{ $eleve->nom }}</td>
                <td>{{ $eleve->prenom }}</td>
                <td>{{ $eleve->email }}</td>
                <td>
                    <a href="{{ route('eleves.show', $eleve->id) }}">Voir</a>
                    <a href="{{ route('eleves.edit', $eleve->id) }}">Modifier</a>
                    <form action="{{ route('eleves.destroy', $eleve->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

{{ $eleves->links() }}

</div>
@endsection