@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>{{ $manga->id_manga ? 'Modification d’un manga' : 'Ajout d’un manga' }}</h2>

        <form action="{{ route('mangas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Titre --}}
            <div class="form-group mb-3">
                <label>Titre :</label>
                <input type="text" name="titre" class="form-control" value="{{ old('titre', $manga->titre) }}" required>
            </div>

            {{-- Genre --}}
            <div class="form-group mb-3">
                <label>Genre :</label>
                <select name="genre" class="form-select" required>
                    <option value="" disabled selected>Sélectionnez un genre</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id_genre }}" {{ old('genre') == $genre->id_genre ? 'selected' : '' }}>
                            {{ $genre->lib_genre }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Dessinateur --}}
            <div class="form-group mb-3">
                <label>Dessinateur :</label>
                <select name="dessinateur" class="form-select" required>
                    <option value="" disabled selected>Sélectionnez un dessinateur</option>
                    @foreach($dessinateurs as $dessinateur)
                        <option value="{{ $dessinateur->id_dessinateur }}" {{ old('dessinateur') == $dessinateur->id_dessinateur ? 'selected' : '' }}>
                            {{ $dessinateur->nom_dessinateur }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Scénariste --}}
            <div class="form-group mb-3">
                <label>Scénariste :</label>
                <select name="scenariste" class="form-select" required>
                    <option value="" disabled selected>Sélectionnez un scénariste</option>
                    @foreach($scenaristes as $scenariste)
                        <option value="{{ $scenariste->id_scenariste }}" {{ old('scenariste') == $scenariste->id_scenariste ? 'selected' : '' }}>
                            {{ $scenariste->nom_scenariste }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Prix --}}
            <div class="form-group mb-3">
                <label>Prix :</label>
                <input type="number" step="0.01" name="prix" class="form-control" value="{{ old('prix', $manga->prix) }}" required>
            </div>

            {{-- Couverture --}}
            <div class="form-group mb-3">
                <label>Couverture :</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="2048000">
                <input type="file" accept="image/*" name="couv" class="form-control">
            </div>

            {{-- Boutons --}}
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Valider</button>
                <a href="{{ route('mangas.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection
