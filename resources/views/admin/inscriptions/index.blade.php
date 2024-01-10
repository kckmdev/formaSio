@extends('layouts.admin')

@section('title', 'BackOffice Admin - Inscriptions')

@section('content')
    <div class="container p-4">
        <div class="flex flex-wrap gap-2 flex-col">
            <div class="col-md-12">
                <h2 class="text-2xl font-bold">Gérer les inscriptions</h2>
            </div>
            <div class="col-md-12">
                <!-- Vous pouvez ajouter ici des boutons ou des filtres si nécessaire -->
            </div>
            <div class="col-md-12">
                <div class="rounded-lg border border-gray-200">
                    <div class="overflow-x-auto rounded-t-lg">
                        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                            <thead class="ltr:text-left rtl:text-right">
                                <tr>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">Nom Utilisateur</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">Formation</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">Date Inscription</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                @foreach ($inscriptions as $inscription)
                                    <tr>
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                            {{ $inscription->utilisateur->nom ?? 'Utilisateur inconnu' }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                            {{ $inscription->formation->intitule ?? 'Formation inconnue' }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                            {{ optional($inscription->date_inscription)->format('d/m/Y') ?? 'Date inconnue' }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">
                                            <div class="flex gap-2 justify-center">
                                                <a href="{{ route('admin.inscriptions.approve', $inscription->id) }}"
                                                    class="text-green-500 hover:text-green-700 font-bold">Approuver</a>
                                                <a href="{{ route('admin.inscriptions.reject', $inscription->id) }}"
                                                    class="text-red-500 hover:text-red-700 font-bold">Rejeter</a>
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
                    {{ $inscriptions->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
