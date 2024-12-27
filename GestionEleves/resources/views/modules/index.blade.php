@extends('template')
@section('content')
<div>
    <a href="{{ route('modules.create') }}">Ajouter un module</a>
    
    <table>
        <thead>
            <tr>
                <th>Code</th>
                <th>Nom</th>
                <th>Coefficient</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($modules as $module)
            <tr>
                <td>{{ $module->code }}</td>
                <td>{{ $module->nom }}</td>
                <td>{{ $module->coefficient }}</td>
                <td>
                    <a href="{{ route('modules.show', $module->code) }}">Voir</a>
                    <a href="{{ route('modules.edit', $module->code) }}">Modifier</a>
                    <form action="{{ route('modules.destroy', $module->code) }}" method="POST" style="display:inline;">
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
@endsection