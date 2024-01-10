@extends('layouts.admin')

@section('title', 'BackOffice Admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-2xl font-bold">Bienvenue sur le BackOffice Admin</h2>
                <h3 class="text-xl font-semibold">Ici vous pouvez :</h3>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="flex flex-wrap gap-2">
                                <a href="{{ route('formations.index') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Gérer les
                                    formations</a>
                                <a href="{{ route('utilisateurs.index') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Gérer les
                                    utilisateurs</a>
                                <a href="{{ route('inscriptions.index') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Gérer les
                                    inscriptions</a>
                                <a href="{{ route('inscriptions.index') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Imprimer
                                    une liste des inscrits à une formation</a>
                                <a href="{{ route('inscriptions.index') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Historiser
                                    les participations en fin d'année</a>
                                <a href="{{ route('intervenants.index') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Gérer les
                                    intervenants</a>
                                <a href="{{ route('sessions.index') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Gérer les
                                    sessions</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
