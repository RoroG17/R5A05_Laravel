<div>
    <form action="{{ route('evaluations.store') }}" method="POST">
        @csrf
        <label>Date :</label><input type="date" name="date_evaluation" required>
        <label>Module :</label>
        <select name="module" id="module" required>
            <option value="" disabled selected>Choisissez un module</option>
            @foreach($modules as $module)
                <option value="{{ $module->code }}">{{ $module->code }} - {{ $module->nom }}</option>
            @endforeach
        </select>
        <label>Titre :</label><input type="text" name="titre" required>
        <label>Coefficient :</label><input type="text" name="coefficient" required>
        <button type="submit">Ajouter</button>
    </form>
</div>
