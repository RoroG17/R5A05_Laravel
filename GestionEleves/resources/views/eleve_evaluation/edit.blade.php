<div>
    <form action="{{ route('evaluation_eleve.update', $eleveEvaluation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Elève :</label>
        <select name="eleve" id="eleve" required>
            <option value="{{ $eleveEvaluation->eleve }}" selected>{{ $eleveEvaluation->nom }} - {{ $eleveEvaluation->prenom }}</option>
            @foreach($eleves as $eleve)
                <option value="{{ $eleve->id }}">{{ $eleve->nom }} - {{ $eleve->prenom }}</option>
            @endforeach
        </select>
        <label>Module :</label>
        <select name="module" id="module" required>
            <option value="{{ $eleveEvaluation->evaluation }}" selected>{{ $eleveEvaluation->titre }}</option>
            @foreach($evaluations as $eval)
                <option value="{{ $eval->id }}">{{ $eval->titre }}</option>
            @endforeach
        </select>
        <label>Note :</label><input type="float" name="note" value="{{ $eleveEvaluation->note }}" required>
        <button type="submit">Mettre à jour</button>
    </form>
</div>
