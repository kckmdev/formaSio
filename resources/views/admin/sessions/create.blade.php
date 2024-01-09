@extends('layouts.admin')

@section('title', 'BackOffice Admin - Créer une nouvelle session')

@section('content')
    <div class="container">
        <div class="flex justify-center">
            <div class="w-8/12">
                <div class="bg-white p-6 rounded-lg">
                    <div class="text-2xl mb-4">Créer une nouvelle session</div>

                    <form method="POST" action="{{ route('sessions.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date</label>
                            <input id="date" type="datetime-local"
                                class="form-input border border-gray-300 rounded-md @error('date') border-red-500 @enderror"
                                name="date" value="{{ old('date') }}" required autofocus
                                style="padding: 0.5rem;">

                            @error('date')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="formation_id" class="block text-gray-700 text-sm font-bold mb-2">Formation</label>
                            <select class="form-select border border-gray-300 rounded-md @error('formation_id') border-red-500 @enderror"
                                id="formation_id" name="formation_id">
                                @foreach($formations as $formation)
                                    <option value="{{ $formation->id }}">{{ $formation->intitule }}</option>
                                @endforeach
                            </select>

                            @error('formation_id')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Ajoutez d'autres champs pour la création de sessions ici -->

                        <div class="flex mt-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium mr-2">
                                Enregistrer
                            </button>
                            <a href="{{ route('sessions.index') }}"
                                class="bg-gray-500 text-white px-4 py-2 rounded font-medium">
                                Retour
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
