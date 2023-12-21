@extends('layouts.app')

@section('title', 'Formations Disponibles')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5 font-bold text-2xl">Formations Disponibles</h1>
    <div class="space-y-4">
        @forelse ($groupedFormations as $domainName => $formations)
        <div class="bg-gray-200 p-2 rounded cursor-pointer mr-20 ml-20 hover:bg-gray-300">
            <h2 class="text-lg" onclick="toggleFormations('{{ Str::slug($domainName) }}')">
                {{ $domainName ?? 'Divers' }}
            </h2>
        </div>
        <div id="{{ Str::slug($domainName) }}" class="hidden">
            @forelse ($formations as $formation)
            <div class="border p-4 rounded  ml-20 mr-20 relative">
                <h3 class="text-xl font-semibold text-gray-800">{{ $formation->intitule }}</h3>
                <button class="bg-blue-500 text-white rounded px-2 py-1 absolute top-2 right-2 -ml-10" onclick="toggleDetails('{{ $formation->id }}', '{{ Str::slug($domainName) }}')">Voir plus</button>
                <div id="details-{{ $formation->id }}" class="hidden">
                    <p><strong>Date :</strong> {{ $formation->duree }}</p>
                    <p><strong>Places Max :</strong> {{ $formation->nb_places_max }}</p>
                    <p><strong>Prix :</strong> {{ $formation->getCoutFormattedAttribute() }}</p>
                    <p><strong>Domaine :</strong> {{ $formation->domaine->libelle ?? 'Non spécifié' }}</p>
                    <button class="bg-green-500 text-white rounded px-2 py-1 mt-3 "onclick="openInscriptionForm('{{ $formation->numero }}')">
                        <a href="{{ route('inscription') }}" class="text-white">S'inscrire</a>
                    </button>
                </div>
            </div>
            @empty
            <div class="text-gray-500">
                <p>Aucune formation disponible sous ce domaine.</p>
            </div>
            @endforelse
        </div>
        @empty
        <p class="text-gray-500">Aucune formation disponible.</p>
        @endforelse
    </div>
</div>

<script>
    function toggleFormations(domainId) {
        const formationsDiv = document.getElementById(domainId);
        formationsDiv.classList.toggle("hidden");

        // Masquer automatiquement les détails lorsque vous cliquez sur un autre domaine
        const detailsElements = document.querySelectorAll('[id^="details-"]');
        detailsElements.forEach((element) => {
            element.classList.add("hidden");
        });
    }

    function toggleDetails(formationId, domainId) {
        const detailsDiv = document.getElementById('details-' + formationId);
        detailsDiv.classList.toggle("hidden");

        // Masquer automatiquement les détails des autres formations
        const detailsElements = document.querySelectorAll('[id^="details-"]');
        detailsElements.forEach((element) => {
            if (element.id !== 'details-' + formationId) {
                element.classList.add("hidden");
            }
        });

        // Faites défiler jusqu'à la formation pour voir plus de détails
        const formationDiv = document.getElementById(domainId);
        formationDiv.scrollIntoView({
            behavior: 'smooth',
        });

        
    }
    //redirect to inscription form with autocomplete in form
    function openInscriptionForm(formationId) {
            window.location.href = "{{ route('inscription') }}?formation_id=" + formationId;
        }
</script>

@endsection
