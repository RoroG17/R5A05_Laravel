@extends('template')
@section('content')
<div>
    <h1>{{ $module->code }} - {{ $module->nom }}</h1>
    <p>Code : {{ $module->code }}</p>
    <p>Nom : {{ $module->nom }}</p>
    <p>Coefficient : {{ $module->coefficient }}</p>

</div>
@endsection