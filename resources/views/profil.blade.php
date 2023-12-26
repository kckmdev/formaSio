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
                                <div class="flex justify-center items-center gap-4 mb-2">
                                    <div class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full">
                                        <strong>Formation:</strong> {{$inscription->session->formation->intitule}}
                                    </div>
                                    <div class="bg-green-100 text-green-800 px-3 py-1 rounded-full">
                                        <strong>Date:</strong> {{$inscription->session->date}} <!-- Assuming you have a 'date' field -->
                                    </div>
                                    <div class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full">
                                        <strong>Coût:</strong> {{$inscription->session->formation->cout}} € <!-- Assuming you have a 'prix' field -->
                                    </div>
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