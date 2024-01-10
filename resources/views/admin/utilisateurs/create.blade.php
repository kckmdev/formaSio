@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="flex justify-center">
            <div class="w-8/12">
                <div class="bg-white p-6 rounded-lg">
                    <h1 class="text-2xl font-bold mb-4">Créer un nouvel utilisateur</h1>

                    <form method="POST" action="{{ route('utilisateurs.store') }}">
                        @csrf

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
                                name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus
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

                        <div class="mb-4">
                            <label for="mot_de_passe" class="block text-gray-700 text-sm font-bold mb-2">Mot de passe</label>
                            <input id="mot_de_passe" type="password"
                                class="form-input border border-gray-300 rounded-md @error('mot_de_passe') border-red-500 @enderror"
                                name="mot_de_passe" required autocomplete="new-password" style="padding: 0.5rem;">

                            @error('mot_de_passe')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="statut" class="block text-gray-700 text-sm font-bold mb-2">Statut</label>
                            <select id="statut"
                                class="form-select border border-gray-300 rounded-md @error('statut') border-red-500 @enderror"
                                name="statut" required style="padding: 0.5rem;">
                                <option value="">Sélectionner un statut</option>
                                <option value="bénévole">Bénévole</option>
                                <option value="salarié">Salarié</option>
                                <option value="admin">Admin</option>
                            </select>

                            @error('statut')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <div class="flex mt-4">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium mr-2">
                                    Enregistrer
                                </button>
                                <a href="{{ route('utilisateurs.index') }}"
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
