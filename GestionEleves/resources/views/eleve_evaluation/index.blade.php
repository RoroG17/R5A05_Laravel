<div>
    <a href="{{ route('evaluation_eleve.create') }}">Ajouter une évaluation</a>

    <table>
        <thead>
        <tr>
            <th>Numéro Etudiant</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Module</th>
            <th>Date</th>
            <th>Evaluation</th>
            <th>Note</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($eleveEvaluations as $ligne)
        <tr>
            <td>{{ $ligne->numero_etudiant }}</td>
            <td>{{ $ligne->nom }}</td>
            <td>{{ $ligne->prenom }}</td>
            <td>{{ $ligne->code }}</td>
            <td>{{ $ligne->date_evaluation }}</td>
            <td>{{ $ligne->titre }}</td>
            <td>{{ $ligne->note }}</td>
            <td>
                <a href="{{ route('evaluation_eleve.show', $ligne->id) }}">Voir</a>
                <a href="{{ route('evaluation_eleve.edit', $ligne->id) }}">Modifier</a>
                <form action="{{ route('evaluation_eleve.destroy', $ligne->id) }}" method="POST" style="display:inline;">
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
