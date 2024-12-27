@extends('template')
@section('content')
<div>
    <form action="{{ route('modules.update', $module->code) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Code :</label><input type="text" name="code" value="{{ $module->code }}" required disabled>
        <label>Nom :</label><input type="text" name="nom" value="{{ $module->nom }}" required>
        <label>coefficient :</label><input type="text" name="coefficient" value="{{ $module->coefficient }}">
        <button type="submit">Mettre à jour</button>
    </form>
</div>
@endsection