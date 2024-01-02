@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex justify-center">
            <div class="w-8/12">
                <div class="bg-white p-6 rounded-lg">
                    <div class="text-2xl mb-4">Créer un nouvel intervenant</div>

                    <form method="POST" action="{{ route('intervenants.store') }}">
                        @csrf

                        <!-- Remplacez les champs ci-dessous par ceux de votre modèle Intervenant -->
                        <div class="mb-4">
                            <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
                            <input id="nom" type="text"
                                class="form-input border border-gray-300 rounded-md @error('nom') border-red-500 @enderror"
                                name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus
                                placeholder="{{ $placeholder->nom }}" style="padding: 0.5rem;">

                            @error('nom')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="prenom" class="block text-gray-700 text-sm font-bold mb-2">Prénom</label>
                            <input id="prenom" type="text"
                                class="form-input border border-gray-300 rounded-md @error('prenom') border-red-500 @enderror"
                                name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom"
                                placeholder="{{ $placeholder->prenom }}" style="padding: 0.5rem;">

                            @error('prenom')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                            <input id="email" type="email"
                                class="form-input border border-gray-300 rounded-md @error('email') border-red-500 @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="{{ $placeholder->email }}" style="padding: 0.5rem;">

                            @error('email')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="telephone" class="block text-gray-700 text-sm font-bold mb-2">Téléphone</label>
                            <input id="telephone" type="text"
                                class="form-input border border-gray-300 rounded-md @error('telephone') border-red-500 @enderror"
                                name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone"
                                placeholder="{{ $placeholder->telephone }}" style="padding: 0.5rem;">

                            @error('telephone')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <div class="flex mt-4">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium mr-2">
                                    Enregistrer
                                </button>
                                <a href="{{ route('intervenants.index') }}"
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