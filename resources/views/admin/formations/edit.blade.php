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
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titre</label>
                            <input id="title" type="text" class="form-input border border-gray-300 rounded-md @error('title') border-red-500 @enderror" name="title" value="{{ old('title', $formation->intitule) }}" required autocomplete="title" autofocus style="padding: 0.5rem;">

                            @error('title')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="place_max" class="block text-gray-700 text-sm font-bold mb-2">Place Maximum</label>
                            <input id="place_max" type="number" class="form-input border border-gray-300 rounded-md @error('place_max') border-red-500 @enderror" name="nb_places_max" value="{{ old('nb_places_max', $formation->nb_places_max) }}" required autocomplete="place_max" style="padding: 0.5rem;">

                            @error('place_max')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="prix" class="block text-gray-700 text-sm font-bold mb-2">Prix</label>
                            <input id="prix" type="number" class="form-input border border-gray-300 rounded-md @error('prix') border-red-500 @enderror" name="cout" value="{{ old('cout', $formation->cout) }}" required autocomplete="prix" style="padding: 0.5rem;">

                            @error('prix')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <div class="flex">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium mr-2">
                                    Enregistrer
                                </button>
                                <a href="{{ route('formations.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded font-medium">
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
