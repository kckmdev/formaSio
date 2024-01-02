@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex justify-center">
            <div class="w-8/12">
                <div class="bg-white p-6 rounded-lg">
                    <div class="text-2xl mb-4">Créer une nouvelle formation</div>

                    <form method="POST" action="{{ route('formations.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="intitule" class="block text-gray-700 text-sm font-bold mb-2">Titre</label>
                            <input id="intitule" type="text"
                                class="form-input border border-gray-300 rounded-md @error('intitule') border-red-500 @enderror"
                                name="intitule" value="{{ old('intitule') }}" required autocomplete="intitule" autofocus
                                placeholder="{{ $placeholder->intitule }}" style="padding: 0.5rem;">

                            @error('intitule')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="nb_places_max" class="block text-gray-700 text-sm font-bold mb-2">Place
                                Maximum</label>
                            <input id="nb_places_max" type="number"
                                class="form-input border border-gray-300 rounded-md @error('nb_places_max') border-red-500 @enderror"
                                name="nb_places_max" value="{{ old('nb_places_max') }}" required
                                autocomplete="nb_places_max" placeholder="{{ $placeholder->nb_places_max }}" style="padding: 0.5rem;">
                            @error('nb_places_max')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="cout" class="block text-gray-700 text-sm font-bold mb-2">Prix</label>
                            <input id="cout" type="number"
                                class="form-input border border-gray-300 rounded-md @error('cout') border-red-500 @enderror"
                                name="cout" value="{{ old('cout') }}" required autocomplete="cout"
                                placeholder="{{ $placeholder->cout }}" style="padding: 0.5rem;">
                            @error('cout')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="duree" class="block text-gray-700 text-sm font-bold mb-2">Durée</label>
                            <input id="duree" type="time"
                                class="form-input border border-gray-300 rounded-md @error('duree') border-red-500 @enderror"
                                name="duree" value="{{ old('duree', $placeholder->duree ) }}" required autocomplete="duree"
                                style="padding: 0.5rem;">
                            @error('duree')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <div class="flex mt-4">
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
                </div>
            </div>
        </div>
    </div>
@endsection
