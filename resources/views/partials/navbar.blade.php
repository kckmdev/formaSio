<nav class="flex items-center justify-between flex-wrap bg-gray-800 p-3 text-white">
    <ul class="flex">
        <li class="mr-6"><a href="/">Forma</a></li>
    </ul>

    <div class="flex justify-end">
        <ul class="flex">
            <li class="mr-6"><a href="/contact">Formations</a></li>
            @if(Auth::check()) <!-- Vérifie si l'utilisateur est connecté -->
                <!-- Affiche le nom de l'utilisateur et un lien pour se déconnecter -->
                <li class="mr-6">
                    <a href="/profile">{{ Auth::user()->name }}</a> <!-- Modifier selon le nom de l'attribut du nom d'utilisateur -->
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
