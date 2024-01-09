@extends('layouts.admin')

@section('title', 'BackOffice Admin - Modifier une session')

@section('content')
    <div class="container">
        <div class="flex justify-center">
            <div class="w-8/12">
                <div class="bg-white p-6 rounded-lg">
                    <div class="text-2xl mb-4">Modifier une session</div>

                    <form method="POST" action="{{ route('sessions.update', $session->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date</label>
                            <input id="date" type="datetime-local"
                                class="form-input border border-gray-300 rounded-md @error('date') border-red-500 @enderror"
                                name="date" value="{{ old('date', $session->date) }}" required autofocus
                                style="padding: 0.5rem;">

                            @error('date')
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
                    <form method="POST" action="{{ route('sessions.destroy', $session->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette session ?')" class="bg-red-500 text-white px-4 py-2 rounded font-medium mt-2">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
