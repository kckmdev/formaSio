<div class="flex h-screen flex-col justify-between border-e bg-white">
    <div class="px-4 py-6">
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="block rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-200 text-white' : '' }}">
                        Général
                    </a>
                </li>

                <li>
                    <details class="group [&_summary::-webkit-details-marker]:hidden"
                        {{ request()->routeIs('intervenants.*') ? 'open' : '' }}>
                        <summary
                            class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                            <span class="text-sm font-medium"> Intervenants </span>

                            <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </summary>

                        <ul class="mt-2 space-y-1 px-4">
                            <li>
                                <a href="{{ route('intervenants.index') }}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 {{ request()->routeIs('intervenants.index') ? 'bg-gray-200 text-white' : '' }}">
                                    Liste des Intervenants
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('intervenants.create') }}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 {{ request()->routeIs('intervenants.create') ? 'bg-gray-200 text-white' : '' }}">
                                    Ajouter un Intervenant
                                </a>
                            </li>
                        </ul>
                    </details>
                </li>

                <li>
                    <details class="group [&_summary::-webkit-details-marker]:hidden"
                        {{ request()->routeIs('formations.*') ? 'open' : '' }}>
                        <summary
                            class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                            <span class="text-sm font-medium"> Formations </span>

                            <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </summary>

                        <ul class="mt-2 space-y-1 px-4">
                            <li>
                                <a href="{{ route('formations.index') }}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 {{ request()->routeIs('formations.index') ? 'bg-gray-200 text-white' : '' }}">
                                    Liste des Formations
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('formations.create') }}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 {{ request()->routeIs('formations.create') ? 'bg-gray-200 text-white' : '' }}">
                                    Ajouter une Formation
                                </a>
                            </li>
                        </ul>
                    </details>
                </li>

                <li>
                    <details class="group [&_summary::-webkit-details-marker]:hidden"
                        {{ request()->routeIs('sessions.*') ? 'open' : '' }}>
                        <summary
                            class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                            <span class="text-sm font-medium"> Sessions </span>

                            <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </summary>

                        <ul class="mt-2 space-y-1 px-4">
                            <li>
                                <a href="{{ route('sessions.index') }}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 {{ request()->routeIs('sessions.index') ? 'bg-gray-200 text-white' : '' }}">
                                    Liste des Sessions
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('sessions.create') }}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 {{ request()->routeIs('sessions.create') ? 'bg-gray-200 text-white' : '' }}">
                                    Ajouter une Session
                                </a>
                            </li>
                        </ul>
                    </details>
                </li>

                <li>
                    <details class="group [&_summary::-webkit-details-marker]:hidden"
                        {{ request()->routeIs('domaines.*') ? 'open' : '' }}>
                        <summary
                            class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                            <span class="text-sm font-medium"> Domaines </span>

                            <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </summary>

                        <ul class="mt-2 space-y-1 px-4">
                            <li>
                                <a href="{{ route('domaines.index') }}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 {{ request()->routeIs('domaines.index') ? 'bg-gray-200 text-white' : '' }}">
                                    Liste des Domaines
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('domaines.create') }}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 {{ request()->routeIs('domaines.create') ? 'bg-gray-200 text-white' : '' }}">
                                    Ajouter un Domaine
                                </a>
                            </li>
                        </ul>
                    </details>
                </li>

                <li>
                    <details class="group [&_summary::-webkit-details-marker]:hidden"
                        {{ request()->routeIs('inscriptions.*') ? 'open' : '' }}>
                        <summary
                            class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                            <span class="text-sm font-medium"> Inscriptions </span>

                            <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </summary>

                        <ul class="mt-2 space-y-1 px-4">
                            <li>
                                <a href="{{ route('inscriptions.index') }}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 {{ request()->routeIs('inscriptions.index') ? 'bg-gray-200 text-white' : '' }}">
                                    Liste des Inscriptions
                                </a>
                            </li>
                        </ul>
                    </details>
                </li>

                <li>
                    <details class="group [&_summary::-webkit-details-marker]:hidden"
                        {{ request()->routeIs('utilisateurs.*') ? 'open' : '' }}>
                        <summary
                            class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                            <span class="text-sm font-medium"> Utilisateurs </span>

                            <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </summary>

                        <ul class="mt-2 space-y-1 px-4">
                            <li>
                                <a href="{{ route('utilisateurs.index') }}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 {{ request()->routeIs('utilisateurs.index') ? 'bg-gray-200 text-white' : '' }}">
                                    Liste des Utilisateurs
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('utilisateurs.create') }}"
                                    class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 {{ request()->routeIs('utilisateurs.create') ? 'bg-gray-200 text-white' : '' }}">
                                    Ajouter un Utilisateur
                                </a>
                            </li>
                        </ul>
                    </details>
                </li>

            </ul>
        </div>

        <div class="sticky inset-x-0 bottom-0 border-t border-gray-100">
            <p class="text-xs text-center py-4">
                Connecté en tant qu'{{ auth()->user()->statut }}
            </p>
        </div>
    </div>
