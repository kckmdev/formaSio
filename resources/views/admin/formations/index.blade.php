@extends('layouts.admin')

@section('title', 'BackOffice Admin- Formations')

@section('content')
<div class="container p-4">
    <div class="flex flex-wrap gap-2 flex-col">
        <div class="col-md-12">
            <h2 class="text-2xl font-bold">Gérer les formations</h2>
        </div>
        <div class="col-md-12">

            <div class="flex justify-between">
                <div class="flex gap-2">
                    <a href="{{ route('formations.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter une
                        formation</a>
                </div>
                @if (now()->month == 12)
                <!-- Bouton actif pour l'historisation -->
                <div class="flex gap-2">
                    <a href="{{ route('admin.formations.historique') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Historiser</a>
                </div>
                @else
                <!-- Bouton désactivé en dehors de la dernière période du mois de l'année -->
                <div class="flex gap-2">
                    <button class="bg-red-500 text-white font-bold py-2 px-4 rounded" disabled>Historiser</button>
                </div>
                @endif
                <form action="{{ route('formations.index') }}" method="GET" class="flex items-center">
                    <label for="nb_lignes" class="mr-2">Nombre de lignes max</label>
                    <select name="nb_lignes" id="nb_lignes" onchange="this.form.submit()" class="p-2 rounded border-gray-300">
                        <option value="5" {{ $nb_lignes == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ $nb_lignes == 10 ? 'selected' : '' }}>10</option>
                        <option value="15" {{ $nb_lignes == 15 ? 'selected' : '' }}>15</option>
                        <option value="20" {{ $nb_lignes == 20 ? 'selected' : '' }}>20</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="col-md-12">

            <div class="rounded-lg border border-gray-200">
                <div class="overflow-x-auto rounded-t-lg">
                    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                        <thead class="ltr:text-left rtl:text-right">
                            <tr>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">Titre</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">Nombre de sessions</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">Place Maximum</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">Prix</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">Domaine</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">Intervenant</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            @foreach ($formations as $formation)
                            <tr>
                                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $formation->intitule }}</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $formation->sessions->count() }}</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $formation->nb_places_max }}</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $formation->cout }}</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">
                                    <a href="{{ route('domaines.edit', $formation->domaine->id) }}" class="text-blue-500 hover:text-blue-700 font-bold">{{ $formation->domaine->libelle }}</a>
                                </td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">
                                    <a href="{{ route('intervenants.edit', $formation->intervenant->id) }}" class="text-blue-500 hover:text-blue-700 font-bold">{{ $formation->intervenant->nom }}</a>
                                </td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">
                                    <div class="flex gap-2 justify-center">
                                        <a href="{{ route('formations.edit', $formation->id) }}" class="text-blue-500 hover:text-blue-700 font-bold">Modifier</a>
                                        <form action="{{ route('formations.destroy', $formation->id) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette formation ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 font-bold">Supprimer</button>
                                        </form>
                                        <form action="{{ route('formations.duplicate', $formation->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="text-green-500 hover:text-green-700 font-bold">Dupliquer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $formations->links() }}
            </div>

        </div>
    </div>
</div>
@endsection