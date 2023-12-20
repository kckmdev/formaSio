@extends('layouts.app')

@section('title', 'Forma')

@section('content')

<form method="POST" action="{{ route('login') }}" class="p-10 bg-white rounded flex justify-center items-center flex-col shadow-md">
    @csrf
    <p class="mb-5 text-3xl text-gray-900 uppercase">Connexion</p>
    <input type="email" name="email" placeholder="Email" class="mb-5 p-3 w-80 focus:border-gray-900 rounded border-2 outline-none text-gray-900">
    <input type="password" name="password" placeholder="Mot de passe" class="mb-5 p-3 w-80 focus:border-gray-900 rounded border-2 outline-none text-gray-900">
    <button class="bg-gray-900 hover:bg-gray-900 text-white font-bold p-2 rounded w-80" type="submit"><span>Se connecter</span></button>
</form>

@endsection