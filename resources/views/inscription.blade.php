@extends('layouts.app')

@section('title', 'Inscription')

@section('content')
@if(session('error'))
<div class="bg-red-500 p-4  mb-6 text-white text-center">
    {{ session('error') }}
</div>
@endif
<div class="bg-white p-8 mx-auto shadow-lg rounded-lg w-96 xl:w-1/2">
    <h1 class="text-2xl font-bold mb-6">BULLETIN D’INSCRIPTION</h1>

    <h2 class="text-xl font-bold mb-6">Formation : {{ $formation->intitule }}</h2>

    <form action="{{ route('inscription') }}" method="POST">
        @csrf
        <div class="mb-6">
            <label for="associationName" class="block text-sm font-medium text-gray-700">Nom de l'association</label>
            <input type="text" name="associationName" id="associationName" class="mt-1 p-2 border rounded w-full" required>
        </div>
        <div class="mb-6">
            <label for="icomNumber" class="block text-sm font-medium text-gray-700">Votre n° Icom à Uniformation</label>
            <input type="text" name="icomNumber" id="icomNumber" class="mt-1 p-2 border rounded w-full" required>
        </div>
        <div class="mb-6">
            <label for="contactName" class="block text-sm font-medium text-gray-700">Interlocuteur de votre
                association</label>
            <input type="text" name="contactName" id="contactName" class="mt-1 p-2 border rounded w-full" required>
        </div>

        <div class="mb-6">
            <label for="stagiaireName" class="block text-sm font-medium text-gray-700">Nom et Prénom du
                stagiaire</label>
            <input type="text" name="stagiaireName" id="stagiaireName" class="mt-1 p-2 border rounded w-full" required>
        </div>
        <div class="mb-6">
            <label for="stagiaireAddress" class="block text-sm font-medium text-gray-700">Adresse du stagiaire</label>
            <input type="text" name="stagiaireAddress" id="stagiaireAddress" class="mt-1 p-2 border rounded w-full" required>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700">Choisir une session</label>
            <select name="session" id="session" class="mt-1 p-2 border rounded w-full" required>
                <option value="">Choisir une session</option>
                @foreach ($formation->sessions as $session)
                <option value="{{ $session->id }}">{{ $session->date->format('d/m/Y H:i:s') }} - {{ $session->lieu }}</option>
                @endforeach
            </select>

        </div>

        <input type="text" name="formationNumbers" value='{{$formation->id}}' hidden>
        

        <div class="mb-6">
            <label for="documents" class="block text-sm font-medium text-gray-700">Documents justificatifs (joindre pour
                la vérification)</label>
            <input type="file" name="documents" id="documents" class="mt-1 p-2 border rounded w-full" required>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Soumettre</button>
    </form>
</div>
@endsection