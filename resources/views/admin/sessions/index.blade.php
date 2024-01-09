@extends('layouts.admin')

@section('title', 'BackOffice Admin - Sessions')

@section('content')
    <div class="container p-4">
        <div class="flex flex-wrap gap-2 flex-col">
            <div class="col-md-12">
                <h2 class="text-2xl font-bold">Gérer les sessions</h2>
            </div>
            <div class="col-md-12">
                <div class="flex justify-between">
                    <div class="flex gap-2">
                        <a href="{{ route('sessions.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter une session</a>
                        <a href="{{ route('sessions.index') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Imprimer une liste des sessions</a>
                    </div>
                    <form action="{{ route('sessions.index') }}" method="GET" class="flex items-center">
                        <label for="nb_lignes" class="mr-2">Nombre de lignes max</label>
                        <select name="nb_lignes" id="nb_lignes" onchange="this.form.submit()"
                            class="p-2 rounded border-gray-300">
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
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">Date</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">Lieu</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">Nom de la formation</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                @foreach ($sessions as $session)
                                    <tr>
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $session->date }}</td>
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $session->lieu }}</td>
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                            <a href="{{ route('formations.edit', $session->formation->id) }}" class="text-blue-500 hover:text-blue-700 font-bold">{{ $session->formation->intitule }}</a>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">
                                            <div class="flex gap-2 justify-center">
                                                <a href="{{ route('sessions.edit', $session->id) }}"
                                                    class="text-blue-500 hover:text-blue-700 font-bold">Modifier</a>
                                                <form action="{{ route('sessions.destroy', $session->id) }}" method="POST"
                                                    class="inline"
                                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette session ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-500 hover:text-red-700 font-bold">Supprimer</button>
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
                    {{ $sessions->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
