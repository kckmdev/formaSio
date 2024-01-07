@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex justify-center">
            <div class="w-8/12">
                <div class="bg-white p-6 rounded-lg">
                    <div class="text-2xl mb-4">Modifier une formation</div>

                    <form method="POST" action="{{ route('formations.update', $formation->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="intitule" class="block text-gray-700 text-sm font-bold mb-2">Titre</label>
                            <input id="intitule" type="text"
                                class="form-input border border-gray-300 rounded-md @error('intitule') border-red-500 @enderror"
                                name="intitule" value="{{ old('intitule', $formation->intitule) }}" required
                                autocomplete="intitule" autofocus style="padding: 0.5rem;">

                            @error('intitule')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="nb_places_max" class="block text-gray-700 text-sm font-bold mb-2">Place
                                Maximum</label>
                            <input id="nb_places_max" type="number"
                                class="form-input border border-gray-300 rounded-md @error('nb_places_max') border-red-500 @enderror"
                                name="nb_places_max" value="{{ old('nb_places_max', $formation->nb_places_max) }}" required
                                autocomplete="nb_places_max" style="padding: 0.5rem;">

                            @error('nb_places_max')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="cout" class="block text-gray-700 text-sm font-bold mb-2">Prix</label>
                            <input id="cout" type="number"
                                class="form-input border border-gray-300 rounded-md @error('cout') border-red-500 @enderror"
                                name="cout" value="{{ old('cout', $formation->cout) }}" required autocomplete="cout"
                                style="padding: 0.5rem;">

                            @error('cout')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="intervenant" class="block text-gray-700 text-sm font-bold mb-2">Intervenant</label>
                            <select id="intervenant" name="intervenant" required>
                                <option value="">Choisir un intervenant</option>
                                @foreach ($intervenants as $intervenant)
                                    <option value="{{ $intervenant->id }}">{{ $intervenant->prenom }}
                                        {{ $intervenant->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="domaine" class="block text-gray-700 text-sm font-bold mb-2">Domaine</label>
                            <select id="domaine" name="domaine" required>
                                <option value="">Choisir un domaine</option>
                                @foreach ($domaines as $domaine)
                                    <option value="{{ $domaine->id }}">{{ $domaine->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <div class="flex">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium mr-2">
                                    Enregistrer
                                </button>
                                <a href="{{ route('formations.index') }}"
                                    class="bg-gray-500 text-white px-4 py-2 rounded font-medium">
                                    Retour
                                </a>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="{{ route('formations.destroy', $formation->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette formation ?')"
                            class="bg-red-500 text-white px-4 py-2 rounded font-medium mt-2">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
