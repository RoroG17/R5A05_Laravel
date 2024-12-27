@extends('template')
@section('content')
<div>
    <form action="{{ route('evaluations.update', $evaluation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Date :</label><input type="date" name="date_evaluation" value="{{ $evaluation->date_evaluation }}" required>
        <label>Module :</label>
        <select name="module" id="module" required>
            <option value="{{ $evaluation->module }}" selected>{{ $evaluation->module }} - {{ $evaluation->nom }}</option>
            @foreach($modules as $module)
                <option value="{{ $module->code }}">{{ $module->code }} - {{ $module->nom }}</option>
            @endforeach
        </select>
        <label>Titre :</label><input type="text" name="titre" value="{{ $evaluation->titre }}" required>
        <label>Coefficient :</label><input type="text" name="coefficient" value="{{ $evaluation->coefficient }}" required>
        <button type="submit">Mettre à jour</button>
    </form>
</div>
@endsection