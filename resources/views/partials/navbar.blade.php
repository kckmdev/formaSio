<nav class="flex items-center justify-between flex-wrap bg-gray-800 p-3 text-white">
    <ul class="flex">
        <li class="mr-6"><a href="/">Forma <span class="bg-blue-400 text-white rounded-md px-2 py-1 text-xs font-bold">SIO</span></a></li>
    </ul>

    <div class="flex justify-end">
        <ul class="flex">
            <li class="mr-6"><a href="/formations">Formations</a></li>
            @if(Auth::check())
            <li class="mr-6">
                @if(Auth::user()->statut == 'admin')
                    <a href="/admin" class="text-white bg-red-500 px-4 py-2 rounded-full shadow-md hover:shadow-lg border border-red-500 hover:border-red-400 transform hover:scale-105 active:scale-90 active:shadow-inner active:text-red-300 transition duration-150 ease-in-out">
                    Administration
                </a>               
                @else(Auth::user()->statut == 'utilisateur')
                    <a href="/profil" class="text-white font-bold bg-gray-700 px-4 py-2 rounded-full shadow-md hover:shadow-lg border border-gray-700 hover:border-gray-500 transform hover:scale-105 active:scale-90 active:shadow-inner active:text-gray-300 transition duration-150 ease-in-out">
                    Profil de {{ Auth::user()->nom }}
                     </a>          
                @endif
            </li>
            <li class="mr-6">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="text-white bg-transparent">Déconnexion</button>
                </form>
            </li>
            @else
            <!-- Lien de connexion pour les utilisateurs non connectés -->
            <li class="mr-6"><a href="/login">Connexion</a></li>
            @endif
        </ul>
    </div>
</nav>