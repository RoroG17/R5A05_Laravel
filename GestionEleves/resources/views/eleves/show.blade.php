<div>
    <h1>{{ $eleve->nom }} {{ $eleve->prenom }}</h1>
    <p>Numéro étudiant : {{ $eleve->numero_etudiant }}</p>
    <p>Date de naissance : {{ $eleve->date_naissance }}</p>
    <p>Email : {{ $eleve->email }}</p>
    <p>Image : {{ $eleve->image }}</p>

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
</div>
