@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<div class="container mx-auto mt-10">
    <!-- Flex Container for overall layout -->
    <div class="flex flex-wrap -mx-2">
        <!-- Flex Row for equal height sections -->
        <div class="flex flex-col md:flex-row w-full">
            <!-- Profile Section -->
            <div class="w-full md:w-1/2 px-2 mb-4">
                <div class="bg-gray-100 p-8 rounded-lg border-l-2 border-blue-500 flex flex-col justify-between h-full">
                    <div class="text-center">
                        <!-- Profile Image -->
                        <img class="w-32 h-32 rounded-full mb-4 mx-auto" src="https://www.gravatar.com/avatar/{{md5(strtolower(trim($utilisateur->email)))}}?d=mp&s=128" alt="User's Profile Picture">

                        <!-- Name and Details -->
                        <h1 class="text-4xl font-bold text-gray-800 mb-2">{{$utilisateur->nom}}</h1>
                        <h2 class="text-2xl font-semibold text-blue-600 mb-2">{{$utilisateur->prenom}}</h2>
                        <p class="text-md text-gray-600 mb-1">{{$utilisateur->email}}</p>
                        <p class="text-md text-gray-600 mb-1">{{$utilisateur->telephone}}</p>
                        <p class="text-md text-gray-600 mb-3">{{$utilisateur->adresse}}</p>
                    </div>

                    <!-- Contact Link -->
                    <div class="text-center mt-4">
                        <a href="mailto:jean.dupont@admin.com" class="text-gray-700 bg-blue-500 hover:bg-blue-300 font-bold py-2 px-4 rounded-full">Contacter un responsable</a>
                    </div>
                </div>
            </div>

            <!-- My registrations Section -->
            <div class="w-full md:w-1/2 px-2 mb-4">
                <div class="bg-gray-100 p-8 rounded-lg  h-full">
                    <div class="flex flex-col items-center justify-between h-full">
                        <div>
                            <h1 class="text-4xl font-bold text-gray-800 mb-2 text-center">Mes inscriptions</h1>
                            <div class="text-md text-gray-600 mb-4">
                                @forelse($inscriptions as $inscription)
                                <!-- Display session details in a flex container -->
                                <div class="bg-white p-4 rounded-lg shadow-md mt-6">

                                    <h3 class="text-lg font-medium mb-4"> {{ $inscription->session->formation->intitule }}</h3>

                                    <div class="grid grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <svg class="w-4 h-4 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <strong>Date :</strong>
                                            <span>{{ $inscription->session->date }}</span>
                                        </div>
                                        <div>
                                            <svg class="w-4 h-4 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <strong>Coût :</strong>
                                            <span>{{ $inscription->session->formation->cout }} €</span>
                                        </div>
                                        <div>
                                            <svg class="w-4 h-4 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20v-7m0 0l-9-5 9 5 9-5-9 5z"></path>
                                            </svg>
                                            <strong>Etat du paiement :</strong>
                                            <span>{{ $inscription->etat_paiement }}</span>
                                        </div>
                                    </div>
                                    <button class="bg-red-500 text-white px-3 py-1 rounded-md">
                                        Annuler l'inscription
                                    </button>
                                </div>
                                @empty
                                <p class="text-center">Vous n'êtes inscrit à aucune formation.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection