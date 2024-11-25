<div>
    <h1>{{ $evaluation->module }} - {{ $evaluation->titre }}</h1>
    <p>Module : {{ $evaluation->nom }}</p>
    <p>Date : {{ $evaluation->date_evaluation }}</p>
    <p>Coefficient : {{ $evaluation->coefficient }}</p>

    <table>
        <thead>
            <td>Numéro étudiant</td>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Note</td>
        </thead>
        <tbody>
        @foreach($notes as $note)
        <tr>
            <td>{{ $note->numero_etudiant }}</td>
            <td>{{ $note->nom }}</td>
            <td>{{ $note->prenom }}</td>
            <td>{{ $note->note }}</td>
        </tr>
        @endforeach
        </tbody>

    </table>
    <h2>Élèves nuls</h2>
    <table>
        <thead>
        <td>Numéro étudiant</td>
        <td>Nom</td>
        <td>Prénom</td>
        <td>Note</td>
        </thead>
        <tbody>
        @foreach($notesNuls as $note)
        <tr>
            <td>{{ $note->numero_etudiant }}</td>
            <td>{{ $note->nom }}</td>
            <td>{{ $note->prenom }}</td>
            <td>{{ $note->note }}</td>
        </tr>
        @endforeach
        </tbody>

    </table>



</div>
