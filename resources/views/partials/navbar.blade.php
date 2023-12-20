<nav class="flex items-center justify-between flex-wrap bg-gray-800 p-3 text-white">
    <ul class="flex">
        <li class="mr-6"><a href="/">Forma</a></li>
    </ul>

    <div class="flex justify-end">
        <ul class="flex">
            <li class="mr-6"><a href="/formations">Formations</a></li>
            @if(Auth::check()) 
                <li class="mr-6">
                    <a href="/profile" class="text-white font-bold bg-green-500 px-4 py-2 rounded-full hover:bg-green-600">Profil de {{ Auth::user()->nom }}</a>
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
