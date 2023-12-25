@extends('layouts.app')

@section('title', 'Inscription')

@section('content')

<div class="bg-white p-8 mx-auto shadow-lg rounded-lg w-96 xl:w-1/2">
    <h1 class="text-2xl font-bold mb-6">BULLETIN D’INSCRIPTION</h1>

    <h2 class="text-xl font-bold mb-6">Formation : {{ $formation->intitule }}</h2>

    <!-- error -->
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
        <ul class="list-disc">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('inscription') }}" method="POST">
        @csrf
        <!-- Coordonnées de l'association -->
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
        <!-- Autres champs pour les coordonnées de l'association -->

        <!-- Informations sur le stagiaire -->
        <div class="mb-6">
            <label for="stagiaireName" class="block text-sm font-medium text-gray-700">Nom et Prénom du
                stagiaire</label>
            <input type="text" name="stagiaireName" id="stagiaireName" class="mt-1 p-2 border rounded w-full" required>
        </div>
        <div class="mb-6">
            <label for="stagiaireAddress" class="block text-sm font-medium text-gray-700">Adresse du stagiaire</label>
            <input type="text" name="stagiaireAddress" id="stagiaireAddress" class="mt-1 p-2 border rounded w-full" required>
        </div>
        <!-- Autres champs pour les informations sur le stagiaire -->

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700">Choisir une session</label>
            <!-- Choisir la session de la base de donnée avec  -->
            <select name="session" id="session" class="mt-1 p-2 border rounded w-full" required>
                <option value="">Choisir une session</option>
                @foreach ($formation->sessions as $session)
                <option value="{{ $session->id }}">{{ $session->date->format('d/m/Y H:i:s') }} - {{ $session->lieu }}</option>
                @endforeach
            </select>

        </div>



        <!-- Numéros des formations demandées -->
        <div class="mb-6">
            <label for="formationNumbers" class="block text-sm font-medium text-gray-700">Numéro de la formation
                demandée</label>
            <input type="text" name="formationNumbers" id="formationNumbers" class="mt-1 p-2 border rounded w-full" value='{{$formation->id}}'>
        </div>
        <!-- Documents justificatifs -->
        <div class="mb-6">
            <label for="documents" class="block text-sm font-medium text-gray-700">Documents justificatifs (joindre pour
                la vérification)</label>
            <input type="file" name="documents" id="documents" class="mt-1 p-2 border rounded w-full" required>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Soumettre</button>
    </form>
</div>
@endsection