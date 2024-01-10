@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="flex justify-center">
            <div class="w-8/12">
                <div class="bg-white p-6 rounded-lg">
                    <div class="text-2xl mb-4">Modifier un utilisateur</div>

                    <form method="POST" action="{{ route('utilisateurs.update', $utilisateur->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
                            <input id="nom" type="text"
                                class="form-input border border-gray-300 rounded-md @error('nom') border-red-500 @enderror"
                                name="nom" value="{{ old('nom', $utilisateur->nom) }}" required
                                autocomplete="nom" autofocus style="padding: 0.5rem;">

                            @error('nom')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="prenom" class="block text-gray-700 text-sm font-bold mb-2">Prénom</label>
                            <input id="prenom" type="text"
                                class="form-input border border-gray-300 rounded-md @error('prenom') border-red-500 @enderror"
                                name="prenom" value="{{ old('prenom', $utilisateur->prenom) }}" required
                                autocomplete="prenom" autofocus style="padding: 0.5rem;">

                            @error('prenom')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                            <input id="email" type="email"
                                class="form-input border border-gray-300 rounded-md @error('email') border-red-500 @enderror"
                                name="email" value="{{ old('email', $utilisateur->email) }}" required
                                autocomplete="email" style="padding: 0.5rem;">

                            @error('email')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="telephone" class="block text-gray-700 text-sm font-bold mb-2">Téléphone</label>
                            <input id="telephone" type="text"
                                class="form-input border border-gray-300 rounded-md @error('telephone') border-red-500 @enderror"
                                name="telephone" value="{{ old('telephone', $utilisateur->telephone) }}" required
                                autocomplete="telephone" style="padding: 0.5rem;">

                            @error('telephone')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="mot_de_passe" class="block text-gray-700 text-sm font-bold mb-2">Mot de passe</label>
                            <input id="mot_de_passe" type="password"
                                class="form-input border border-gray-300 rounded-md @error('mot_de_passe') border-red-500 @enderror"
                                name="mot_de_passe" autocomplete="new-password" style="padding: 0.5rem;">

                            @error('mot_de_passe')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="statut" class="block text-gray-700 text-sm font-bold mb-2">Statut</label>
                            <select id="statut" name="statut"
                                class="form-select border border-gray-300 rounded-md @error('statut') border-red-500 @enderror"
                                required style="padding: 0.5rem;">
                                <option value="bénévole" {{ old('statut', $utilisateur->statut) === 'bénévole' ? 'selected' : '' }}>Bénévole</option>
                                <option value="salarié" {{ old('statut', $utilisateur->statut) === 'salarié' ? 'selected' : '' }}>Salarié</option>
                                <option value="admin" {{ old('statut', $utilisateur->statut) === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>

                            @error('statut')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <div class="flex">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium mr-2">
                                    Enregistrer
                                </button>
                                <a href="{{ url()->previous() }}"
                                    class="bg-gray-500 text-white px-4 py-2 rounded font-medium">
                                    Retour
                                </a>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="{{ route('utilisateurs.destroy', $utilisateur->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')" class="bg-red-500 text-white px-4 py-2 rounded font-medium mt-2">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
