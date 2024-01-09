@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="flex justify-center">
            <div class="w-8/12">
                <div class="bg-white p-6 rounded-lg">
                    <h1 class="text-2xl font-bold mb-4">Créer un nouveau domaine</h1>

                    <form method="POST" action="{{ route('domaines.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="libelle" class="block text-gray-700 text-sm font-bold mb-2">Libellé</label>
                            <input id="libelle" type="text"
                                class="form-input border border-gray-300 rounded-md @error('libelle') border-red-500 @enderror"
                                name="libelle" value="{{ old('libelle') }}" required autocomplete="libelle" autofocus
                                placeholder="{{ $placeholder->libelle }}" style="padding: 0.5rem;">

                            @error('libelle')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <div class="flex mt-4">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium mr-2">
                                    Enregistrer
                                </button>
                                <a href="{{ route('domaines.index') }}"
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
