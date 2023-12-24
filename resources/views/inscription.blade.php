@extends('layouts.app')

@section('title', 'Inscription')

@section('content')

<div class="bg-white p-8 mx-auto shadow-lg rounded-lg w-96 xl:w-1/2">
    <h1 class="text-2xl font-bold mb-6">BULLETIN D’INSCRIPTION</h1>
    
    <h2 class="text-xl font-bold mb-6">Formation : {{ $formation->intitule }}</h2>

    <form action="{{ route('inscription') }}" method="POST">
        @csrf
        <!-- Coordonnées de l'association -->
        <div class="mb-6">
            <label for="associationName" class="block text-sm font-medium text-gray-700">Nom de l'association</label>
            <input type="text" name="associationName" id="associationName" class="mt-1 p-2 border rounded w-full"
                required>
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
            <input type="text" name="stagiaireAddress" id="stagiaireAddress" class="mt-1 p-2 border rounded w-full"
                required>
        </div>
        <!-- Autres champs pour les informations sur le stagiaire -->
        <!-- Choisir le statut (Salarié ou Bénévole) -->
        
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700">Statut</label>
            <div class="mt-2">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="statut" value="Salarié" class="form-checkbox text-blue-500">
                    <span class="ml-2">Salarié</span>
                </label>
                <label class="inline-flex items-center ml-6">
                    <input type="checkbox" name="statut" value="Bénévole" class="form-checkbox text-blue-500">
                    <span class="ml-2">Bénévole</span>
                </label>
            </div>
        </div>



        <!-- Numéros des formations demandées -->
        <div class="mb-6">
            <label for="formationNumbers" class="block text-sm font-medium text-gray-700">Numéros des formations
                demandées (séparés par des espaces)</label>
            <input type="text" name="formationNumbers" id="formationNumbers" class="mt-1 p-2 border rounded w-full" value='{{$formation->id}}'>
        </div>
        <!-- Documents justificatifs -->
        <div class="mb-6">
            <label for="documents" class="block text-sm font-medium text-gray-700">Documents justificatifs (joindre pour
                la vérification)</label>
            <input type="file" name="documents" id="documents" class="mt-1 p-2 border rounded w-full" required>
        </div>

        <button type="submit"
            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Soumettre</button>
    </form>
</div>
@endsection