@extends('layouts.app')

@section('title', 'Forma')

@section('content')
<div class="flex items-center justify-center">
    <div class="relative p-10 bg-white rounded shadow-md max-w-lg w-full">
        @if(session('statut')) 
        <div id="errorMessage" class="absolute top-0 mt-2 left-0 right-0 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-center"
            role="alert">
            <span>{{ session('statut') }}</span>
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="mt-10 flex flex-col justify-center items-center">
            @csrf
            <p class="mb-5 text-3xl text-gray-900 uppercase">Connexion</p>
            <input type="email" name="email" placeholder="Email" class="mb-5 p-3 w-full focus:border-gray-900 rounded border-2 outline-none text-gray-900">
            <input type="password" name="password" placeholder="Mot de passe" class="mb-5 p-3 w-full focus:border-gray-900 rounded border-2 outline-none text-gray-900">
            <button class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded w-full" type="submit">Se connecter</button>
        </form>
    </div>
</div>
@endsection
