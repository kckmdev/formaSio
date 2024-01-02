@extends('layouts.app')

@section('title', 'BackOffice Admin- Intervenants')

@section('content')
    <div class="container p-4">
        <div class="flex flex-wrap gap-2 flex-col">
            <div class="col-md-12">
                <h2 class="text-2xl font-bold">Gérer les intervenants</h2>
            </div>
            <div class="col-md-12">

                <div class="flex justify-between">
                    <div class="flex gap-2">
                        <a href="{{ route('intervenants.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter un
                            intervenant</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">

                <div class="rounded-lg border border-gray-200">
                    <div class="overflow-x-auto rounded-t-lg">
                        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                            <thead class="ltr:text-left rtl:text-right">
                                <tr>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">Prénom</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">Email</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">Téléphone</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                @foreach ($intervenants as $intervenant)
                                    <tr>
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $intervenant->nom }}</td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $intervenant->email }}</td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ $intervenant->telephone }}</td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">
                                            <div class="flex gap-2 justify-center">
                                                <a href="{{ route('intervenants.edit', $intervenant->id) }}" class="text-blue-500 hover:text-blue-700 font-bold">Modifier</a>
                                                <form action="{{ route('intervenants.destroy', $intervenant->id) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet intervenant ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700 font-bold">Supprimer</button>
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
                    {{ $intervenants->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection