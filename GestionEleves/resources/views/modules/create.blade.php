@extends('template')
@section('content')
<div>
    <form action="{{ route('modules.store') }}" method="POST">
        @csrf
        <label>Code :</label><input type="text" name="code" required>
        <label>nom :</label><input type="text" name="nom" required>
        <label>coefficient :</label><input type="text" name="coefficient">
        <button type="submit">Ajouter</button>
    </form>
</div>
@endsection