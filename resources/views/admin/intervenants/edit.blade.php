@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="flex justify-center">
            <div class="w-8/12">
                <div class="bg-white p-6 rounded-lg">
                    <div class="text-2xl mb-4">Modifier un intervenant</div>

                    <form method="POST" action="{{ route('intervenants.update', $intervenant->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
                            <input id="nom" type="text"
                                class="form-input border border-gray-300 rounded-md @error('nom') border-red-500 @enderror"
                                name="nom" value="{{ old('nom', $intervenant->nom) }}" required
                                autocomplete="nom" autofocus style="padding: 0.5rem;">

                            @error('nom')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="prenom" class="block text-gray-700 text-sm font-bold mb-2">Prénom</label>
                            <input id="prenom" type="text"
                                class="form-input border border-gray-300 rounded-md @error('prenom') border-red-500 @enderror"
                                name="prenom" value="{{ old('prenom', $intervenant->prenom) }}" required
                                autocomplete="prenom" style="padding: 0.5rem;">

                            @error('prenom')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                            <input id="email" type="email"
                                class="form-input border border-gray-300 rounded-md @error('email') border-red-500 @enderror"
                                name="email" value="{{ old('email', $intervenant->email) }}" required
                                autocomplete="email" style="padding: 0.5rem;">

                            @error('email')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="telephone" class="block text-gray-700 text-sm font-bold mb-2">Téléphone</label>
                            <input id="telephone" type="tel"
                                class="form-input border border-gray-300 rounded-md @error('telephone') border-red-500 @enderror"
                                name="telephone" value="{{ old('telephone', $intervenant->telephone) }}" required
                                autocomplete="telephone" style="padding: 0.5rem;">

                            @error('telephone')
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
                    <form method="POST" action="{{ route('intervenants.destroy', $intervenant->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet intervenant ?')" class="bg-red-500 text-white px-4 py-2 rounded font-medium mt-2">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
