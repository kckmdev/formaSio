    @extends('layouts.app')

    @section('title', 'Forma')

    @section('content')

    <div class="container">
        <h1>Formations disponibles</h1>
        <div class="row">
            @foreach ($formations as $formation)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">{{ $formation->intitule }}</h3>
                            <p class="card-text">{{ $formation->domaine }}</p>
                            <p class="card-text">{{ $formation->cout }} €</p>
                            @foreach ($formation->sessions as $session)
                                <div>{{ $session->date->format('d/m/Y H:i') }} - {{ $session->lieu }}</div>
                            @endforeach
                            <a href="#" class="btn btn-primary">En savoir plus</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endsection