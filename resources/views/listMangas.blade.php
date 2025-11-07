@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Liste des mangas</h1>

        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Couverture</th>
                <th>Titre</th>
                <th>Genre</th>
                <th>Dessinateur</th>
                <th>Scénariste</th>
                <th>Prix (€)</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mangas as $manga)
                <tr>
                    <td>
                        <img class="img-thumbnail"
                             src="{{ asset('assets/images/' . $manga->couverture) }}"
                             alt="Couverture de {{ $manga->titre }}"
                             style="max-height: 120px;">
                    </td>
                    <td>{{ $manga->titre }}</td>
                    <td>{{ $manga->lib_genre }}</td>
                    <td>{{ $manga->nom_dessinateur }}</td>
                    <td>{{ $manga->nom_scenariste }}</td>
                    <td>{{ number_format($manga->prix, 2) }}</td>

                    <td>
                        <a href="{{ url('/mangas/edit/' . $manga->id) }}" title="Modifier">
                            <i class="bi bi-pencil-square text-primary"></i>
                        </a>

                        <a href="{{ url('/mangas/delete/' . $manga->id) }}"
                           onclick="return confirm('Supprimer ce manga ?')"
                           title="Supprimer">
                            <i class="bi bi-trash text-danger"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


